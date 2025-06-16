<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use App\Models\Supervisors;
use App\Models\Company;
use App\Services\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecommendationService $recommendationService)
    {
        $user = Auth::user();

        if ($user->role == 'student') {
            // --- FIX FOR "YOUR INTERNSHIP" SECTION ---
            // Query for the accepted application ONCE and load all needed relationships.
            $acceptedApplication = InternshipApplication::with([
                'internship.company', // Load internship and its company
                'supervisor.user'     // Load supervisor and their user info
            ])
            ->where('student_id', $user->student->id)
            ->where('status', 'accepted')
            ->first(); // Get only the first one

            // Your existing logic for application history is already efficient.
            $histories = InternshipApplication::with('internship.company')
                ->where('student_id', $user->student->id)
                ->latest()
                ->paginate(2);

            // Fetch recommendations (the service already handles eager-loading for this)
            $allRecommendations = $recommendationService->getRankedInternships()->take(10);
            $topRecommendations = $allRecommendations->take(3);

            return view('dashboard', compact(
                'user',
                'histories',
                'acceptedApplication', // <-- Pass the single object to the view
                'topRecommendations',
                'allRecommendations'
            ));
        }

        if ($user->role == 'supervisor') {
            // Your supervisor logic can also be optimized, but let's focus on the student dashboard first.
            // This part remains the same for now.
            $supervisor = Supervisors::where('user_id', $user->id)->first();
            if ($supervisor) {
                $supervisedApplications = InternshipApplication::with(['student.user', 'internship.company'])
                    ->where('supervisor_id', $supervisor->id)
                    ->where('status', 'accepted')
                    ->latest()
                    ->paginate(5);

                $activeInternships = $supervisedApplications->count();
                $activeCompanies = $supervisedApplications->pluck('internship.company')->unique('id')->count();

                return view('dashboard', compact('user', 'supervisedApplications', 'activeInternships', 'activeCompanies'));
            }
        }

        if ($user->role == 'admin') {
            $internshipCounts = $this->getInternshipCountsByCompany();
            $studentSupervisorCounts = $this->getStudentSupervisorCounts();
            $studentOutcomeTrends = $this->getStudentOutcomeTrends();
            $studentInternshipPercentage = $this->getStudentInternshipPercentage();

            $acceptedInternships = InternshipApplication::where('status', 'accepted')->with('internship')->get();

            $internshipTypeDistribution = $acceptedInternships->groupBy('internship.type')->map(function ($items) {
                return $items->count();
            });
            return view('dashboard', compact('user', 'internshipCounts', 'studentSupervisorCounts', 'studentOutcomeTrends', 'studentInternshipPercentage', 'internshipTypeDistribution'));
        }

        return view('dashboard', compact('user'));
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

    /**
     * Get internship counts by company for bar chart.
     */
    private function getInternshipCountsByCompany()
    {
        return \App\Models\Internship::select('companies.name as company_name', \DB::raw('count(internships.id) as internship_count'))
            ->join('companies', 'internships.company_id', '=', 'companies.id')
            ->groupBy('companies.name')
            ->orderBy('internship_count', 'desc')
            ->get();
    }

    private function getStudentSupervisorCounts()
    {
        $studentCount = \App\Models\Student::count();
        $supervisorCount = \App\Models\Supervisors::count();
        return ['students' => $studentCount, 'supervisors' => $supervisorCount];
    }

    private function getStudentOutcomeTrends()
    {
        $internshipApplications = InternshipApplication::with('internship')
            ->where('internship_applications.status', 'accepted')
            ->selectRaw('DATE_FORMAT(internship_applications.created_at, "%Y-%m") as month, internships.title, count(*) as count')
            ->join('internships', 'internship_applications.internship_id', '=', 'internships.id')
            ->groupBy('month', 'internships.title')
            ->orderBy('month')

            ->get();

        $trends = [];
        $allTypes = $internshipApplications->pluck('title')->unique()->toArray();

        foreach ($internshipApplications as $item) {
            if (!isset($trends[$item->month])) {
                $trends[$item->month] = [];
            }
            $trends[$item->month][$item->title] = $item->count;
        }

        // Fill in missing months and types with 0
        $currentMonth = Carbon::now()->startOfMonth();
        for ($i = 0; $i < 12; $i++) {
            $month = $currentMonth->format('Y-m');
            if (!isset($trends[$month])) {
                $trends[$month] = [];
            }
            foreach ($allTypes as $title) {
                if (!isset($trends[$month][$title])) {
                    $trends[$month][$title] = 0;
                }
            }
            $currentMonth->subMonth();
        }

        ksort($trends);

        return $trends;
    }

    private function getStudentInternshipPercentage()
    {
        $totalStudents = \App\Models\Student::count();
        $studentsWithAcceptedInternship = \App\Models\InternshipApplication::where('status', 'accepted')->distinct('student_id')->count();

        if ($totalStudents > 0) {
            return round(($studentsWithAcceptedInternship / $totalStudents) * 100, 2);
        } else {
            return 0;
        }
    }
}
