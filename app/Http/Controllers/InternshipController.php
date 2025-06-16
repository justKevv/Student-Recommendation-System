<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Internship;
use App\Models\InternshipApplication;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use ImageKit\ImageKit;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = app('current.user');
        $query = Internship::with('company', 'applications');

        // Handle search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($searchTerm) . '%'])
                  ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($searchTerm) . '%'])
                  ->orWhereRaw('LOWER(requirements) LIKE ?', ['%' . strtolower($searchTerm) . '%'])
                  ->orWhereHas('company', function($companyQuery) use ($searchTerm) {
                      $companyQuery->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($searchTerm) . '%']);
                  });
            });
        }

        $allInternships = $query->get()->sortBy('asc');

        if ($user->role == 'admin') {
            $adminId = $user->admin->id;
            $adminInternships = Internship::with('company', 'applications')->where('admin_id', $adminId)->get()->sortBy('asc');
            $companies = Company::all();
            return view('interadm', compact('user', 'allInternships', 'adminInternships', 'companies'));
        }
        return view('internship', compact('user', 'allInternships'));
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
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'eligibility_criteria' => 'required|string',
            'responsibility_titles' => 'required|array|min:1',
            'responsibility_titles.*' => 'required|string|max:255',
            'responsibility_items' => 'required|array',
            'responsibility_items.*' => 'required|array|min:1',
            'responsibility_items.*.*' => 'required|string',
            'type' => 'required|in:remote,hybrid,on_site',
            'location' => 'required|string|max:255',
            'open_until' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'internship_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $processTextarea = function ($text) {
            if (is_null($text)) {
                return [];
            }
            $lines = explode("\n", $text);
            $trimmedLines = array_map('trim', $lines);
            return array_filter($trimmedLines);
        };

        $openUntil = Carbon::parse($request->open_until)->endOfDay();
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $internshipData = [
            'company_id' => $request->company_id,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => array_filter(explode("\n", trim($request->requirements))),
            'eligibility_criteria' => array_filter(explode("\n", trim($request->eligibility_criteria))),
            'responsibilities' => $this->formatResponsibilities($request->responsibility_titles, $request->responsibility_items),
            'type' => $request->type,
            'location' => $request->location,
            'open_until' => $openUntil,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'internship_picture' => null
        ];

        // Create the internship
        $internship = Internship::create($internshipData);

        // Handle internship picture upload if provided
        if ($request->hasFile('internship_picture')) {
            try {
                $imageKit = new ImageKit(
                    env('IMAGEKIT_PUBLIC_KEY'),
                    env('IMAGEKIT_PRIVATE_KEY'),
                    env('IMAGEKIT_URL_ENDPOINT')
                );

                $file = $request->file('internship_picture');
                $fileName = 'internship_' . $internship->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $folderPath = '/next-step/internships/';

                $uploadFile = $imageKit->uploadFile([
                    'file' => fopen($file->getRealPath(), 'r'),
                    'fileName' => $fileName,
                    'folder' => $folderPath,
                    'useUniqueFileName' => false,
                    'overwriteFile' => true,
                    'overwriteAITags' => true,
                    'overwriteTags' => true,
                    'overwriteCustomMetadata' => true
                ]);

                if ($uploadFile) {
                    $fileDetails = $imageKit->getFileDetails($uploadFile->result->fileId);
                    $internship->internship_picture = $fileDetails->result->url;
                    $internship->save();
                }
            } catch (\Exception $e) {
            }
        }

        return redirect()->back()->with('success', 'Internship created successfully!');
    }

    /**
     * Format responsibilities data into the expected structure
     */
    private function formatResponsibilities($titles, $items)
    {
        $responsibilities = [];

        if ($titles && $items) {
            foreach ($titles as $index => $title) {
                if (!empty($title) && isset($items[$index]) && !empty($items[$index])) {
                    // Process all items in this section, not just the first one
                    $sectionItems = [];
                    foreach ($items[$index] as $item) {
                        if (!empty(trim($item))) {
                            $sectionItems[] = trim($item);
                        }
                    }

                    if (!empty($sectionItems)) {
                        $responsibilities[] = [
                            'title' => $title,
                            'items' => $sectionItems
                        ];
                    }
                }
            }
        }

        return $responsibilities;
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $user = app('current.user');
        $internship = Internship::findBySlug($slug);
        $internship->load('applications'); // Load applications separately
        $student = Student::where('user_id', $user->id)->first();

        // Check if the current user has already applied for this internship
        $hasApplied = false;
        if ($user && $user->role === 'student') {
            $hasApplied = InternshipApplication::where('student_id', $student->id)
                ->where('internship_id', $internship->id)
                ->exists();
        }

        return view('interman', compact('user', 'internship', 'hasApplied'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Internship $internship) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Internship $internship)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'eligibility_criteria' => 'required|string',
            'responsibility_titles' => 'required|array|min:1',
            'responsibility_titles.*' => 'required|string|max:255',
            'responsibility_items' => 'required|array',
            'responsibility_items.*' => 'required|array|min:1',
            'responsibility_items.*.*' => 'required|string',
            'type' => 'required|in:remote,hybrid,on_site',
            'location' => 'required|string|max:255',
            'open_until' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'internship_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $processTextarea = function ($text) {
            if (is_null($text)) {
                return [];
            }
            $lines = explode("\n", $text);
            $trimmedLines = array_map('trim', $lines);
            return array_filter($trimmedLines);
        };

        $openUntil = Carbon::parse($request->open_until)->endOfDay();
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $internshipData = [
            'company_id' => $request->company_id,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => array_filter(explode("\n", trim($request->requirements))),
            'eligibility_criteria' => array_filter(explode("\n", trim($request->eligibility_criteria))),
            'responsibilities' => $this->formatResponsibilities($request->responsibility_titles, $request->responsibility_items),
            'type' => $request->type,
            'location' => $request->location,
            'open_until' => $openUntil,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'internship_picture' => null
        ];

        $internship->update($internshipData);

        // Handle internship picture upload if provided
        if ($request->hasFile('internship_picture')) {
            try {
                $imageKit = new ImageKit(
                    env('IMAGEKIT_PUBLIC_KEY'),
                    env('IMAGEKIT_PRIVATE_KEY'),
                    env('IMAGEKIT_URL_ENDPOINT')
                );

                $file = $request->file('internship_picture');
                $fileName = 'internship_' . $internship->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $folderPath = '/next-step/internships/';

                $uploadFile = $imageKit->uploadFile([
                    'file' => fopen($file->getRealPath(), 'r'),
                    'fileName' => $fileName,
                    'folder' => $folderPath,
                    'useUniqueFileName' => false,
                    'overwriteFile' => true,
                    'overwriteAITags' => true,
                    'overwriteTags' => true,
                    'overwriteCustomMetadata' => true
                ]);

                if ($uploadFile) {
                    $fileDetails = $imageKit->getFileDetails($uploadFile->result->fileId);
                    $internship->internship_picture = $fileDetails->result->url;
                    $internship->update();
                }
            } catch (\Exception $e) {
            }
        }

        return redirect()->back()->with('success', 'Internship updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Internship $internship)
    {
        $internship->delete();

        return redirect()->route('internship.management')
            ->with('success', 'Internship deleted successfully.');
    }
}
