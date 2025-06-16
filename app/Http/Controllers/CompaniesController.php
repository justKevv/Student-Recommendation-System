<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\InternshipApplication;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = app('current.user');

        // Get companies that the supervisor has through internship applications
        // Include internships, their applications, and the students in those applications
        $companies = Company::with([
            'internships' => function($query) use ($user) {
                $query->whereHas('applications', function($subQuery) use ($user) {
                    $subQuery->where('supervisor_id', $user->supervisor->id);
                });
            },
            'internships.applications' => function($query) use ($user) {
                $query->where('supervisor_id', $user->supervisor->id)
                      ->with('student.user'); // Include student and user data
            }
        ])->whereHas('internships.applications', function($query) use ($user) {
            $query->where('supervisor_id', $user->supervisor->id);
        })->distinct()->get();

        return view('compup', compact('user', 'companies'));
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
     * Display the specified resource.
     */
    public function show($company)
    {
        $user = app('current.user');

        if (is_numeric($company)) {
            $companyData = Company::with(['internships' => function($query) {
                $query->with('company');
            }])->findOrFail($company);
        } else {
            $companyName = str_replace('-', ' ', $company);
            $companyData = Company::with(['internships' => function($query) {
                $query->with('company');
            }])->where('name', 'LIKE', '%' . $companyName . '%')->firstOrFail();
        }

        return view('company', compact('companyData', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
