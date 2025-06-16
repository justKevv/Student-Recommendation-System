<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ImageKit\ImageKit;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = app('current.user');
        if ($user->role == 'student') {
            $acceptedApplication = InternshipApplication::with(['internship.company'])
                ->where('student_id', $user->student->id)
                ->where('status', 'accepted')
                ->first();

            return view('profile', compact('user', 'acceptedApplication'));
        }
        return view('profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Upload profile photo to ImageKit
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'profile_picture' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        try {
            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $user = Auth::user();
            $file = $request->file('profile_picture');

            // Create a consistent filename for the user
            $fileName = 'profile_' . $user->id . '.jpg';
            $folderPath = '/next-step/users/' . $user->role . '/profile_picture/';

            // Upload to ImageKit with overwrite enabled
            $uploadFile = $imageKit->uploadFile([
                'file' => fopen($file->getPathname(), 'r'),
                'fileName' => $fileName,
                'folder' => $folderPath,
                'useUniqueFileName' => false, // Keep same filename
                'overwriteFile' => true,      // Replace existing file
                'overwriteAITags' => true,
                'overwriteTags' => true,
                'overwriteCustomMetadata' => true
            ]);

            if ($uploadFile && isset($uploadFile->result)) {
                // Get the file ID from upload response
                $fileId = $uploadFile->result->fileId;

                // Fetch complete file details to get URL with updatedAt parameter
                $fileDetails = $imageKit->getFileDetails($fileId);

                if ($fileDetails && isset($fileDetails->result)) {
                    // Use the complete URL with updatedAt parameter
                    $completeUrl = $fileDetails->result->url;

                    // Update user's profile_picture field in database
                    $user->update(['profile_picture' => $completeUrl]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Profile photo updated successfully',
                        'profile_picture_url' => $completeUrl
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image'
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = app('current.user');

        if ($user->role === 'supervisor') {
            $request->validate([
                'phone' => ['required', 'string', 'max:20']
            ]);

            try {
                $user->update([
                    'phone' => $request->phone
                ]);

                return redirect()->back()->with('success', 'Profile updated successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => 'Failed to update profile: ' . $th->getMessage()]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateSkills(Request $request)
    {
        $request->validate([
            'skills' => ['nullable', 'array'],
            'skills.*' => ['nullable', 'max:255']
        ]);

        $user = app('current.user');
        if (!$user->student) {
            return response()->json([
                'success' => false,
                'message' => 'Student profile not found'
            ], 404);
        }

        $user->student->update([
            'skills' => $request->skills ?? []
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skills updated successfully'
        ]);
    }

    /**
     * Update student preferences for location and internship type
     */
    public function updatePreferences(Request $request)
    {
        $request->validate([
            'preferred_location' => ['nullable', 'string', 'max:255'],
            'preferred_internship_type' => ['nullable', 'string', 'max:255']
        ]);

        $user = app('current.user');

        if (!$user->student) {
            return redirect()->back()->withErrors('Student profile not found');
        }

        try {
            $user->student->update([
                'preferred_location' => $request->preferred_location,
                'preferred_internship_type' => $request->preferred_internship_type
            ]);

            return redirect()->back()->with('success', 'Preferences updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update preferences: ' . $e->getMessage()]);
        }
    }

    /**
     * Update research interests for the authenticated user's supervisor profile.
     */
    public function updateResearchInterests(Request $request)
    {
        $request->validate([
            'research_interests' => ['nullable', 'array'],
            'research_interests.*' => ['nullable', 'max:255']
        ]);

        $user = app('current.user');

        if (!$user->supervisor) {
            return response()->json([
                'success' => false,
                'message' => 'Supervisor profile not found'
            ], 404);
        }

        $user->supervisor->update([
            'research_interests' => $request->research_interests ?? []
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Research interests updated successfully'
        ]);
    }

    public function updateExpertiseAreas(Request $request)
    {
        $request->validate([
            'expertise_areas' => ['nullable', 'array'],
            'expertise_areas.*' => ['nullable', 'max:255']
        ]);

        $user = app('current.user');
        if (!$user->supervisor) {
            return response()->json([
                'success' => false,
                'message' => 'Supervisor profile not found'
            ], 404);
        }
        $user->supervisor->update([
            'expertise_areas' => $request->expertise_areas ?? []
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Expertise areas updated successfully'
        ]);
    }

    /**
     * Show student profile by slug
     */
    public function showStudent($slug)
    {
        $user = User::whereHas('student', function ($query) use ($slug) {
            $query->whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [strtolower($slug)]);
        })->with(['student.projects', 'student.experiences', 'student.certificates'])->first();

        if (!$user) {
            abort(404, 'Student not found');
        }

        return view('profile', compact('user'));
    }

    /**
     * Show supervisor profile by slug
     */
    public function showSupervisor($slug)
    {
        $user = User::whereHas('supervisor', function ($query) use ($slug) {
            $query->whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [strtolower($slug)]);
        })->with('supervisor')->first();

        if (!$user) {
            abort(404, 'Supervisor not found');
        }

        return view('profile', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
