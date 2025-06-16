<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentDetailController extends Controller
{
    /**
     * Display the specified student detail.
     */
    public function show($studentId = null)
    {
        $user = app('current.user');

        // If no student ID is provided, show a default view
        if (!$studentId) {
            return view('studup', compact('user'));
        }
          // Get student with related data
        $student = Student::with([
            'user',
            'experiences',
            'projects',
            'certificates',
            'applications.internship.company',
            'applications.logs'
        ])->findOrFail($studentId);

        // Get the student's internship application for logging
        $application = $student->applications()->where('status', 'accepted')->first();

        return view('studup', compact('user', 'student', 'application'));
    }
}
