<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view for the given token.
     */
    public function showResetForm(Request $request, $token = null)
    {
        // Verify token exists and is valid
        $resetRecord = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(1)) // Token valid for 1 hour
            ->first();

        if (!$resetRecord) {
            return redirect()->route('password.request')
                           ->withErrors(['token' => 'This password reset token is invalid or has expired.']);
        }

        return view('auth.passwords.reset', ['token' => $token, 'email' => $resetRecord->email]);
    }

    /**
     * Reset the given user's password.
     */
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Verify token
        $resetRecord = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->where('created_at', '>', Carbon::now()->subHours(1))
            ->first();

        if (!$resetRecord) {
            return back()->withErrors(['token' => 'This password reset token is invalid or has expired.']);
        }

        // Find user
        $user = User::where('email', $resetRecord->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'We cannot find a user with that email address.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // Delete the reset token
        DB::table('password_reset_tokens')
            ->where('email', $resetRecord->email)
            ->delete();

        // Log the user in
        Auth::login($user);

        return redirect()->route('dashboard')
                        ->with('status', 'Your password has been reset successfully!');
    }
}
