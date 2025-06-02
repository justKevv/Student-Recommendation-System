<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Generate OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Store OTP in session or database
        $request->session()->put('password_reset_otp', $otp);
        $request->session()->put('password_reset_email', $request->email);
        $request->session()->put('otp_expires_at', Carbon::now()->addMinutes(10));

        // In a real application, you would send this OTP via email
        // For now, we'll just redirect to OTP verification
        // Mail::to($request->email)->send(new \App\Mail\OtpMail($otp));

        return redirect()->route('otp.show')->with('status', 'OTP sent to your email address.');
    }

    /**
     * Show OTP verification form.
     */
    public function showOtpForm()
    {
        return view('auth.passwords.verify-otp');
    }

    /**
     * Verify OTP and redirect to password reset form.
     */
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp1' => 'required|numeric',
            'otp2' => 'required|numeric',
            'otp3' => 'required|numeric',
            'otp4' => 'required|numeric',
            'otp5' => 'required|numeric',
            'otp6' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $enteredOtp = $request->otp1 . $request->otp2 . $request->otp3 .
                     $request->otp4 . $request->otp5 . $request->otp6;

        $sessionOtp = $request->session()->get('password_reset_otp');
        $expiresAt = $request->session()->get('otp_expires_at');

        if (!$sessionOtp || !$expiresAt) {
            return back()->withErrors(['otp' => 'OTP session expired. Please request a new one.']);
        }

        if (Carbon::now()->gt($expiresAt)) {
            $request->session()->forget(['password_reset_otp', 'password_reset_email', 'otp_expires_at']);
            return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
        }

        if ($enteredOtp !== $sessionOtp) {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        // Generate password reset token
        $token = Str::random(64);
        $email = $request->session()->get('password_reset_email');

        // Store reset token
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        // Clear OTP session data
        $request->session()->forget(['password_reset_otp', 'password_reset_email', 'otp_expires_at']);

        return redirect()->route('password.reset', ['token' => $token])
                        ->with('status', 'OTP verified successfully.');
    }
}
