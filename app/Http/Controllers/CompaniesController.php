<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = app('current.user');
        return view('compup', compact('user'));
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
