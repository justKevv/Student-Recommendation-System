<?php

namespace App\Http\Controllers\Student;

use App\Models\Experience;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;

class ExperienceController extends Controller
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
    public function store(StoreExperienceRequest $request)
    {
        $validated = $request->validated();

        // Get the authenticated user's student record
        $student = auth()->user()->student;

        if (!$student) {
            return redirect()->back()->with('error', 'Student profile not found.');
        }

        // Add student_id to the validated data
        $validated['student_id'] = $student->id;

        // Convert description to array if it's a string
        if (isset($validated['description']) && !empty($validated['description'])) {
            $validated['description'] = array_filter(array_map('trim', explode("\n", $validated['description'])));
        }

        try {
            $experience = Experience::create($validated);

            return redirect()->back()->with('success', 'Experience added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add experience. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        // Check if the experience belongs to the authenticated user
        $student = auth()->user()->student;

        if (!$student || $experience->student_id !== $student->id) {
            return redirect()->back()->with('error', 'Unauthorized access to this experience.');
        }

        $validated = $request->validated();

        // Convert description to array if it's a string
        if (isset($validated['description']) && !empty($validated['description'])) {
            $validated['description'] = array_filter(array_map('trim', explode("\n", $validated['description'])));
        } else {
            $validated['description'] = null;
        }

        try {
            $experience->update($validated);

            return redirect()->back()->with('success', 'Experience updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update experience. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        // Check if the experience belongs to the authenticated user
        $student = auth()->user()->student;

        if (!$student || $experience->student_id !== $student->id) {
            return redirect()->back()->with('error', 'Unauthorized access to this experience.');
        }

        try {
            $experience->delete();

            return redirect()->back()->with('success', 'Experience deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete experience. Please try again.');
        }
    }
}
