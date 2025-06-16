<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ImageKit\ImageKit;

class CvController extends Controller
{
    /**
     * Display the CV management page
     */
    public function index()
    {
        return view('student.cv');
    }

    public function redirect_to_dashboard() {
        $user = Auth::user();
        $user->first_login = false;
        $user->save();

        return redirect()->route('dashboard');

    }

    /**
     * Upload CV file using ImageKit
     */
    public function upload(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:5120', // 5MB max
        ]);

        try {
            $user = Auth::user();
            $student = $user->student;

            if (!$student) {
                return redirect()->back()->with('error', 'Student profile not found.');
            }

            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $file = $request->file('cv_file');
            $studentId = $student->id;

            // Create a consistent filename for the CV (will overwrite if exists)
            $fileName = 'cv_' . $studentId . '.pdf';
            $folderPath = '/next-step/students/cvs/';

            // Upload to ImageKit with overwrite enabled
            $uploadFile = $imageKit->uploadFile([
                'file' => fopen($file->getPathname(), 'r'),
                'fileName' => $fileName,
                'folder' => $folderPath,
                'useUniqueFileName' => false,
                'overwriteFile' => true,
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
                    // Update student's cv_path with the complete URL
                    $student->cv_path = $fileDetails->result->url;
                    $student->save();

                    return redirect()->back()->with('success', 'CV uploaded successfully!');
                }
            }

            return redirect()->back()->with('error', 'Failed to upload CV. Please try again.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while uploading your CV: ' . $e->getMessage());
        }
    }
}
