<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use ImageKit\ImageKit;

class OnboardingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        switch ($user->onboarding_step) {
            case 0:
                return view('student.onboarding');
            case 1:
                return redirect()->route('student.skills');
            case 2:
                return redirect()->route('student.experience');
            case 3:
                return redirect()->route('student.project');
        }
    }

    public function indexSkills()
    {
        $user = auth()->user();
        $skills = $user->student->skills ? $user->student->skills : [];
        return view('student.skills', compact('skills'));
    }



    public function indexExperience()
    {
        $user = auth()->user();
        $experiences = Experience::where('student_id', $user->student->id)->get();
        return view('student.experience', compact('experiences'));
    }

    public function indexProject()
    {
        $user = auth()->user();
        $projects = Project::where('student_id', $user->student->id)->get();
        return view('student.project', compact('projects'));
    }

    public function indexCertificate()
    {
        $user = auth()->user();
        $certificates = Certificate::where('student_id', $user->student->id)->get();
        return view('student.certification', compact('certificates'));
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

    public function storeSkills(Request $request)
    {
        $request->validate([
            'skills' => 'required|array',
            'skills.*' => 'string|max:255'
        ]);

        $user = Auth::user();
        $student = auth()->user()->student;
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student profile not found'], 404);
        }

        $student->update([
            'skills' => json_encode($request->skills)
        ]);

        $user->onboarding_step = 2;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Skills updated successfully']);
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->onboarding_step = 1;
        $user->save();


        return redirect()->route('student.skills');
    }

    public function storeExperience(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'employment_type' => 'required|string|in:full-time,part-time,contract,freelance',
            'company' => 'required|string|max:255',
            'type' => 'required|string|in:remote,on_site,hybrid',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_currently_working_here' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        // Get the current authenticated student
        $student = auth()->user()->student;

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student profile not found.'
            ], 404);
        }

        // Handle description - convert to array if it's a string
        $description = $request->description;
        if ($description && !is_array($description)) {
            // If description comes as JSON string, decode it
            $decodedDescription = json_decode($description, true);
            $description = $decodedDescription ?: [$description];
        }

        // Create the experience
        Experience::create([
            'student_id' => $student->id,
            'title' => $request->title,
            'employment_type' => $request->employment_type,
            'company' => $request->company,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->is_currently_working_here ? null : $request->end_date,
            'is_currently_working_here' => $request->boolean('is_currently_working_here'),
            'description' => $description,
        ]);

        $user = Auth::user();
        $user->onboarding_step = 3;
        $user->save();

        return redirect()->back()->with('success', 'Experience added successfully!');
    }

    public function storeCertificate(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'issuer' => ['required', 'string', 'max:255'],
            'issue_date' => ['required','date'],
            'description' => ['nullable','string'],
            'certificate_link' => ['nullable', 'url'],
            'certificate_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif|max:2048'],
        ]);

        $student  = Auth::user()->student;

        $certificationData = [
            'student_id' => $student->id,
            'title' => $request->title,
            'issuer' => $request->issuer,
            'issue_date' => $request->issue_date,
            'description' => $request->description,
            'certificate_link' => $request->certificate_link,
        ];

        if ($request->hasFile('certificate_image')) {
            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $file = $request->file('certificate_image');
            $studentId = $student->id;

            $fileName = 'certificate_'. $studentId. '_'. \Illuminate\Support\Str::snake($request->title). '.jpg';
            $folderPath = '/next-step/students/certifications/';

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
                    $certificationData['certificate_image'] = $fileDetails->result->url;
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to get image details'
                    ], 500);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to upload image'
                ], 500);
            }
        }

        $certificate = Certificate::create($certificationData);

        return redirect()->back()->with('success', 'Certificate added successfully!');
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
     * Remove the specified experience from storage.
     */
    public function destroyExperience(Experience $experience)
    {
        // Check if the experience belongs to the authenticated user's student
        $student = auth()->user()->student;

        if (!$student || $experience->student_id !== $student->id) {
            return redirect()->route('student.experience')->with('error', 'Unauthorized action.');
        }

        $experience->delete();

        return redirect()->route('student.experience')->with('success', 'Experience deleted successfully!');
    }

    public function destroyCertificate(Certificate $certificate)
    {
        // Check if the certificate belongs to the authenticated user's student
        $student = auth()->user()->student;

        if (!$student || $certificate->student_id !== $student->id) {
            return redirect()->route('student.certificate')->with('error', 'Unauthorized action.');
        }

        $certificate->delete();

        return redirect()->route('student.certificate')->with('success', 'Certificate deleted successfully!');
    }

    /**
     * Store a new project.
     */
    public function storeProject(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'project_skills' => 'required|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = auth()->user();
        $student = $user->student;

        // Convert comma-separated skills to JSON array
        $skills = array_map('trim', explode(',', $request->project_skills));

        $projectData = [
            'student_id' => $student->id,
            'title' => $request->title,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'live_link' => $request->live_link,
            'project_skills' => json_encode($skills),
        ];

        // Handle image upload
        if ($request->hasFile('project_image')) {
            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $file = $request->file('project_image');
            $user = auth()->user();
            $studentId = $user->student->id;

            // Create a consistent filename for the project (will overwrite if exists)
            $fileName = 'project_' . $studentId . '_' . \Illuminate\Support\Str::snake($request->title) . '.jpg';
            $folderPath = '/next-step/students/projects/';

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

                // Fetch complete file details to get URL
                $fileDetails = $imageKit->getFileDetails($fileId);

                if ($fileDetails && isset($fileDetails->result)) {
                    // Use the complete URL
                    $projectData['project_image'] = $fileDetails->result->url;
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to get image details'
                    ], 500);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to upload image'
                ], 500);
            }
        }

        $project = Project::create($projectData);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Project added successfully!',
                'project' => $project
            ]);
        }

        return redirect()->route('student.project')->with('success', 'Project added successfully!');
    }

    /**
     * Delete a specific project.
     */
    public function destroyProject(Project $project)
    {
        $user = auth()->user();
        $student = $user->student;

        // Check if the project belongs to the authenticated student
        if (!$student || $project->student_id !== $student->id) {
            return redirect()->route('student.project')->with('error', 'Unauthorized action.');
        }

        $project->delete();

        return redirect()->route('student.project')->with('success', 'Project deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
