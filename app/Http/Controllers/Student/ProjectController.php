<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ImageKit\ImageKit;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        // Get the authenticated user's student ID
        $studentId = Auth::user()->student->id;

        // Handle file upload
        if ($request->hasFile('media')) {
            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $file = $request->file('media');
            $studentId = Auth::user()->student->id;

            $fileName = 'project_' . $studentId . '_' . \Illuminate\Support\Str::snake($validated['title']) . '.jpg';
            $folderPath = '/next-step/students/projects/';

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

                // Fetch complete file details to get URL
                $fileDetails = $imageKit->getFileDetails($fileId);

                if ($fileDetails && isset($fileDetails->result)) {
                    // Use the complete URL
                    $validated['project_image'] = $fileDetails->result->url;
                } else {
                    return redirect()->back()->with('error', 'Failed to get image details');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Handle technologies - convert comma-separated string to array
        if ($request->filled('technologies')) {
            $technologies = array_map('trim', explode(',', $validated['technologies']));
            $validated['project_skills'] = $technologies;
        } else {
            $validated['project_skills'] = [];
        }

        // Map form fields to database fields
        $projectData = [
            'student_id' => $studentId,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'project_image' => $validated['project_image'] ?? null,
            'project_skills' => $validated['project_skills'],
            'live_link' => $validated['project_url'] ?? null,
            'github_link' => $validated['github_url'] ?? null,
        ];

        // Remove the form-specific fields that don't exist in database
        unset($validated['technologies'], $validated['project_url'], $validated['github_url'], $validated['media']);

        Project::create($projectData);

        return redirect()->back()->with('success', 'Project added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // Check if the project belongs to the authenticated user
        if ($project->student_id !== Auth::user()->student->id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validated();

        // Handle file upload
        if ($request->hasFile('media')) {
            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $file = $request->file('media');
            $studentId = Auth::user()->student->id;

            $fileName = 'project_' . $studentId . '_' . \Illuminate\Support\Str::snake($validated['title']) . '.jpg';
            $folderPath = '/next-step/students/projects/';

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

                // Fetch complete file details to get URL
                $fileDetails = $imageKit->getFileDetails($fileId);

                if ($fileDetails && isset($fileDetails->result)) {
                    // Use the complete URL
                    $validated['project_image'] = $fileDetails->result->url;
                } else {
                    return redirect()->back()->with('error', 'Failed to get image details');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Handle technologies - convert comma-separated string to array
        if ($request->filled('technologies')) {
            $technologies = array_map('trim', explode(',', $validated['technologies']));
            $validated['project_skills'] = $technologies;
        } else {
            $validated['project_skills'] = [];
        }

        // Map form fields to database fields
        $projectData = [
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'project_skills' => $validated['project_skills'],
            'live_link' => $validated['project_url'] ?? null,
            'github_link' => $validated['github_url'] ?? null,
        ];

        // Only update image if new one was uploaded
        if (isset($validated['project_image'])) {
            $projectData['project_image'] = $validated['project_image'];
        }

        $project->update($projectData);

        return redirect()->back()->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {        // Check if the project belongs to the authenticated user
        if ($project->student_id !== Auth::user()->student->id) {
            abort(403, 'Unauthorized action.');
        }

        // Note: ImageKit files are managed externally, no local file deletion needed

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
}
