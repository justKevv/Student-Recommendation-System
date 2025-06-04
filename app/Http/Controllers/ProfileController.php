<?php

namespace App\Http\Controllers;

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
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
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
            $folderPath = '/next-step/users/profile_picture/';

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
