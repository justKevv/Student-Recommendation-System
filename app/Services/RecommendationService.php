<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Support\Collection;
use Exception;

class RecommendationService
{
    /**
     * The main public method that orchestrates the recommendation process.
     */
    public function getRankedInternships(): Collection
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'student' || !$user->student) {
            return collect();
        }

        $student = $user->student;
        $profileText = $this->buildProfileText($student);
        if (empty(trim($profileText))) {
            return collect();
        }

        $predictedCategory = $this->getPredictedCategory($profileText);
        $preferredType = $student->preferred_internship_type ?? "remote";

        $query = Internship::with('company');

        // if ($predictedCategory) {
        //     $query->where('title', 'like', '%' . $predictedCategory . '%');
        // }

        if ($preferredType) {
            $query->where('type', 'like', '%' . $preferredType . '%');
        }

        // dd(
        //     'About to search for candidate internships with these filters:',
        //     [
        //         'Student Preferred Type' => $preferredType,
        //         'SQL Query To Be Run' => $query->toSql(),
        //         'Values for the Query' => $query->getBindings(),
        //     ]
        // );

        // We fetch a broad list of candidates and let FastAPI do all the ranking.
        $candidateInternships = $query->latest()->take(100)->get();

        // dd([
        //     'MESSAGE' => 'Final check before making the 2nd API call.',
        //     '1. AI Predicted Category' => $predictedCategory,
        //     '2. User Preferred Type (Hardcoded for Test)' => $preferredType,
        //     '3. SQL Query That Ran' => $query->toSql(),
        //     '4. Number of Internships Found by Query' => $candidateInternships->count()
        // ]);

        // Fallback: If the specific search yields no results, get the most recent internships.
        if ($candidateInternships->isEmpty()) {
            if (Internship::count() > 0) {
                $candidateInternships = Internship::with('company')->latest()->get();
            } else {
                return collect(); // No internships in the database at all.
            }
        }

        // Call the ranking API with this broader list of candidates
        return $this->fetchAndProcessRankings(
            $profileText,
            $predictedCategory,
            $student,
            $candidateInternships
        );
    }

    /**
     * Private helper to call the category prediction API.
     */
    private function getPredictedCategory(string $profileText): ?string
    {
        try {
            $predictionApiUrl = 'http://127.0.0.1:8000/api/v1/predict-category';
            $response = Http::timeout(5)->post($predictionApiUrl, ['profile_text' => $profileText]);

            if ($response->successful()) {
                return $response->json()['predicted_category'] ?? null;
            }
        } catch (Exception $e) {
            Log::error('Category Prediction API call failed: ' . $e->getMessage());
        }
        return null;
    }

    /**
     * Private helper that contains the actual API call logic for ranking.
     */
    private function fetchAndProcessRankings(string $profileText, ?string $predictedCategory, Student $student, Collection $candidateInternships): Collection
    {

        $payload = [
            'profile_text' => $profileText,
            'predicted_category' => $predictedCategory,
            'preferred_location' => $student->preferred_location ?? 'jakarta',
            'internships' => $candidateInternships->map(fn($internship) => [
                'id' => $internship->id,
                'internship_text' => $this->buildInternshipText($internship),
                'location' => $internship->location,
            ])->toArray(),
        ];

        try {
            $rankingApiUrl = 'http://127.0.0.1:8000/api/v1/recommend-internships';
            $response = Http::timeout(15)->post($rankingApiUrl, $payload);

            if ($response->successful()) {
                $rankedIds = $response->json()['recommendations'] ?? [];
                if (empty($rankedIds))
                    return collect();

                // --- THIS IS THE FIX ---
                // Eager-load all relationships needed by the sidebar view.
                $internshipsFromDb = Internship::with('company', 'applications')->findMany($rankedIds);

                return $internshipsFromDb->sortBy(fn($internship) => array_search($internship->id, $rankedIds));
            }
        } catch (Exception $e) {
            Log::error('Ranking API call failed: ' . $e->getMessage());
        }

        return collect();
    }

    /**
     * Builds a rich text block for an internship based on its requirements and responsibilities.
     */
    private function buildInternshipText(Internship $internship): string
    {
        $internshipText = "";
        if (!empty($internship->requirements) && is_array($internship->requirements)) {
            $internshipText .= "--- REQUIREMENTS ---\n";
            $internshipText .= "- " . implode("\n- ", $internship->requirements) . "\n\n";
        }

        if (!empty($internship->responsibilities) && is_array($internship->responsibilities)) {
            $internshipText .= "--- RESPONSIBILITIES ---\n";
            foreach ($internship->responsibilities as $section) {
                if (!empty($section['items']) && is_array($section['items'])) {
                    $internshipText .= "- " . implode("\n- ", $section['items']) . "\n";
                }
            }
            $internshipText .= "\n";
        }

        return empty(trim($internshipText)) ? $internship->title : trim($internshipText);
    }

    /**
     * Builds a rich text block from a student's entire profile.
     */
    private function buildProfileText(Student $student): string
    {
        $student->load('experiences', 'projects', 'certificates');
        $text = "";

        if (!empty($student->skills) && is_array($student->skills)) {
            $text .= "--- SKILLS ---\n" . implode(', ', $student->skills) . "\n\n";
        }

        if ($student->experiences->isNotEmpty()) {
            $text .= "--- EXPERIENCE ---\n";
            foreach ($student->experiences as $exp) {
                $text .= "Title: " . $exp->title . "\n";
                if ($exp->company) {
                    $text .= "Company: " . $exp->company . "\n";
                }
                if (!empty($exp->description) && is_array($exp->description)) {
                    $text .= "Description:\n- " . implode("\n- ", $exp->description) . "\n\n";
                }
            }
        }

        if ($student->projects->isNotEmpty()) {
            $text .= "--- PROJECTS ---\n";
            foreach ($student->projects as $project) {
                $text .= "Project: " . $project->title . "\n";
                $text .= "Description: " . strip_tags($project->description) . "\n";
                if (!empty($project->project_skills) && is_array($project->project_skills)) {
                    $text .= "Skills Used: " . implode(', ', $project->project_skills) . "\n";
                }
                $text .= "\n";
            }
        }

        if ($student->certificates->isNotEmpty()) {
            $text .= "--- CERTIFICATES ---\n";
            foreach ($student->certificates as $cert) {
                $text .= $cert->title . " - Issued by: " . $cert->issuer . "\n";
            }
            $text .= "\n";
        }

        return trim($text);
    }
}
