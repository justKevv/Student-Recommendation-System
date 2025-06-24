<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Internship;
use App\Models\InternshipApplication;
use App\Models\Student;
use App\Models\Supervisors;
use App\Models\User;
use Illuminate\Http\Request;

class InternshipApplicationController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'internship_id' => 'required|exists:internships,id',
        ]);

        $user = app('current.user');
        $student = Student::where('user_id', $user->id)->first();
        $admin = Admin::inRandomOrder()->first();

        // Check if user is a student
        if ($user->role !== 'student') {
            return redirect()->back()->with('error', 'Only students can apply for internships.');
        }

        $existingApplication = InternshipApplication::where('student_id', $student->id)
            ->where('internship_id', $request->internship_id)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this internship.');
        }

        // Create the application
        InternshipApplication::create([
            'student_id' => $student->id,
            'internship_id' => $request->internship_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(InternshipApplication $internshipApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternshipApplication $internshipApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InternshipApplication $internshipApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternshipApplication $internshipApplication)
    {
        //
    }

    /**
     * Show students for a closed internship
     */
    public function showStudents($internshipId)
    {
        $user = app('current.user');

        $internship = Internship::with('company')->findOrFail($internshipId);

        // Check if internship is closed (open_until has passed)
        if ($internship->open_until->isFuture()) {
            return redirect()->back()->with('error', 'This internship is still open for applications.');
        }

        // Get all students who applied for this internship with pagination, excluding those with accepted internships
        $students = Student::whereHas('applications', function($query) use ($internshipId) {
            $query->where('internship_id', $internshipId);
        })->whereDoesntHave('applications', function($query) {
            $query->where('status', 'accepted');
        })->with(['user', 'applications' => function($query) use ($internshipId) {
            $query->where('internship_id', $internshipId);
        }])->paginate(10);

        return view('stuinteradm', compact('internship', 'students', 'user'));
    }

    /**
     * Show student application detail with internship for approve/reject
     */
    public function showStudentApplicationDetail($studentId, $internshipId)
    {
        $user = app('current.user');

        // Get the student with all necessary relationships
        $student = Student::with(['user', 'applications' => function($query) use ($internshipId) {
            $query->where('internship_id', $internshipId);
        }])->findOrFail($studentId);

        // Get the internship with company details
        $internship = Internship::with('company')->findOrFail($internshipId);

        // Get the specific application
        $application = InternshipApplication::with('supervisor.user')->where('student_id', $studentId)
            ->where('internship_id', $internshipId)
            ->firstOrFail();

        // Get all supervisors for the modal
        $supervisors = Supervisors::with('user')->get();

        return view('student-application-detail', compact('student', 'internship', 'application', 'user', 'supervisors'));
    }    /**
     * Approve an application
     */
    public function approveApplication(Request $request, InternshipApplication $application)
    {
        $request->validate([
            'supervisor_id' => 'required|exists:supervisors,id',
        ]);

        $application->update([
            'status' => 'accepted',
            'supervisor_id' => $request->supervisor_id,
        ]);

        return redirect()->back()->with('success', 'Application has been accepted successfully!');
    }

    /**
     * Reject an application
     */
    public function rejectApplication(Request $request, InternshipApplication $application)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        $application->update([
            'status' => 'rejected',
            'feedback' => $request->feedback,
        ]);

        return redirect()->back()->with('success', 'Application has been rejected.');
    }

}
