<?php

namespace App\Http\Controllers;

use App\Models\StudentLog;
use App\Models\InternshipApplication;
use Illuminate\Http\Request;
use ImageKit\ImageKit;
use Illuminate\Support\Facades\View;

class StudentLogController extends Controller
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
            'application_id' => 'required|exists:internship_applications,id',
            'log_date' => 'required|date',
            'description' => 'required|string|max:65535',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $data = $request->only(['application_id', 'log_date', 'description']);

        // Handle file upload to ImageKit if present
        if ($request->hasFile('media')) {
            try {
                // Initialize ImageKit
                $imageKit = new ImageKit(
                    env('IMAGEKIT_PUBLIC_KEY'),
                    env('IMAGEKIT_PRIVATE_KEY'),
                    env('IMAGEKIT_URL_ENDPOINT')
                );

                $file = $request->file('media');
                $application = InternshipApplication::findOrFail($request->application_id);

                // Create a unique filename
                $fileName = 'log_' . $application->student_id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $folderPath = '/next-step/student-logs/' . $application->student_id . '/';

                // Upload to ImageKit
                $uploadFile = $imageKit->uploadFile([
                    'file' => fopen($file->getPathname(), 'r'),
                    'fileName' => $fileName,
                    'folder' => $folderPath,
                    'useUniqueFileName' => false,
                ]);

                if ($uploadFile && isset($uploadFile->result)) {
                    $data['media_path'] = $uploadFile->result->url;
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'File upload failed: ' . $e->getMessage()
                ], 500);
            }
        }

        $studentLog = StudentLog::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Log entry saved successfully!',
            'data' => $studentLog
        ]);
    }

    /**
     * Get logs for a specific date and application.
     */    public function getLogsByDate(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:internship_applications,id',
            'log_date' => 'required|date'
        ]);

        $logs = StudentLog::where('application_id', $request->application_id)
            ->whereDate('log_date', $request->log_date)
            ->get();

        // Log for debugging
        \Illuminate\Support\Facades\Log::info('Fetching logs for application_id: ' . $request->application_id . ', date: ' . $request->log_date . ', found: ' . $logs->count());

        return response()->json([
            'success' => true,
            'data' => $logs
        ]);
    }

    /**
     * Get all logs for an application.
     */
    public function getLogsByApplication($applicationId)
    {
        $logs = StudentLog::where('application_id', $applicationId)
            ->orderBy('log_date', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $logs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentLog $studentLog)
    {
        $request->validate([
            'supervisor_feedback' => 'required|string|max:65535',
        ]);

        $studentLog->update([
            'supervisor_feedback' => $request->supervisor_feedback,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Supervisor feedback added successfully!',
            'data' => $studentLog
        ]);
    }

    /**
     * Add supervisor feedback to a student log entry.
     */
    public function addSupervisorFeedback(Request $request, $logId)
    {
        $request->validate([
            'feedback' => 'required|string|max:65535',
        ]);

        $log = StudentLog::findOrFail($logId);

        // Check if the user is authorized to add feedback
        // This should be replaced with proper authorization logic
        // For example, checking if the user is a supervisor for this internship
        // $this->authorize('addFeedback', $log);

        $log->supervisor_feedback = $request->feedback;
        $log->save();

        return response()->json([
            'success' => true,
            'message' => 'Feedback added successfully',
            'data' => $log
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentLog $studentLog)
    {
        //
    }

    /**
     * Download logs for a specific week.
     */
    public function downloadLogsByWeek(Request $request, $applicationId, $startDate)
    {
        $request->validate([
            'format' => 'nullable|in:pdf,csv'
        ]);

        $format = $request->format ?? 'pdf';
        $startDate = \Carbon\Carbon::parse($startDate);
        $endDate = (clone $startDate)->addDays(6); // 7 days including the start date

        $application = InternshipApplication::with(['student.user', 'internship.company'])
            ->findOrFail($applicationId);

        $logs = StudentLog::where('application_id', $applicationId)
            ->whereBetween('log_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->orderBy('log_date', 'asc')
            ->get();

        $studentName = $application->student->user->name;
        $companyName = $application->internship->company->name;
        $fileName = "log-report-{$studentName}-week-{$startDate->format('Y-m-d')}-to-{$endDate->format('Y-m-d')}";

        if ($format === 'csv') {
            return $this->generateCsvReport($logs, $fileName, $application, $startDate, $endDate);
        } else {
            return $this->generatePdfReport($logs, $fileName, $application, $startDate, $endDate);
        }
    }

    /**
     * Download logs for a specific month.
     */
    public function downloadLogsByMonth(Request $request, $applicationId, $yearMonth)
    {
        $request->validate([
            'format' => 'nullable|in:pdf,csv'
        ]);

        $format = $request->format ?? 'pdf';
        list($year, $month) = explode('-', $yearMonth);

        $startDate = \Carbon\Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = (clone $startDate)->endOfMonth();

        $application = InternshipApplication::with(['student.user', 'internship.company'])
            ->findOrFail($applicationId);

        $logs = StudentLog::where('application_id', $applicationId)
            ->whereBetween('log_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->orderBy('log_date', 'asc')
            ->get();

        $studentName = $application->student->user->name;
        $companyName = $application->internship->company->name;
        $monthName = $startDate->format('F');
        $fileName = "log-report-{$studentName}-{$monthName}-{$year}";

        if ($format === 'csv') {
            return $this->generateCsvReport($logs, $fileName, $application, $startDate, $endDate);
        } else {
            return $this->generatePdfReport($logs, $fileName, $application, $startDate, $endDate);
        }
    }

    /**
     * Generate a PDF report for logs.
     */
    private function generatePdfReport($logs, $fileName, $application, $startDate, $endDate)
    {
        $studentName = $application->student->user->name;
        $companyName = $application->internship->company->name;
        $position = $application->internship->title;

        // Since we don't have DomPDF installed, we'll generate an HTML report with print-friendly styles
        $html = View::make('reports.logs-report-pdf', [
            'logs' => $logs,
            'student' => $application->student,
            'internship' => $application->internship,
            'company' => $application->internship->company,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'studentName' => $studentName,
            'companyName' => $companyName,
            'position' => $position
        ])->render();

        // Return as a downloadable HTML file
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', "attachment; filename=\"{$fileName}.html\"");
    }

    /**
     * Generate a CSV report for logs.
     */
    private function generateCsvReport($logs, $fileName, $application, $startDate, $endDate)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}.csv",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function() use ($logs, $application, $startDate, $endDate) {
            $file = fopen('php://output', 'w');

            // Add header information
            fputcsv($file, ["Student Log Report"]);
            fputcsv($file, ["Student Name", $application->student->user->name]);
            fputcsv($file, ["Student ID", $application->student->nim]);
            fputcsv($file, ["Company", $application->internship->company->name]);
            fputcsv($file, ["Position", $application->internship->title]);
            fputcsv($file, ["Period", $startDate->format('Y-m-d') . " to " . $endDate->format('Y-m-d')]);
            fputcsv($file, []);

            // Add column headers for log entries
            fputcsv($file, ["Date", "Description", "Supervisor Feedback"]);

            // Add log data
            foreach ($logs as $log) {
                $description = strip_tags($log->description);
                fputcsv($file, [
                    $log->log_date->format('Y-m-d'),
                    $description,
                    $log->supervisor_feedback ?? 'No feedback'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
