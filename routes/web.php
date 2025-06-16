<?php

use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\InternshipApplicationController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\CvController;
use App\Http\Controllers\Student\ExperienceController;
use App\Http\Controllers\Student\ProjectController;
use App\Http\Controllers\Student\CertificateController;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\StudentLogController;
use Illuminate\Support\Facades\Auth;

// Root route redirection
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Password Reset Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('otp.show');
    Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('otp.verify');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// PROTECTED ROUTES (Require Authentication)
Route::middleware('auth')->group(function () {
    // Onboarding Routes
    Route::prefix('onboarding')->group(function () {
        Route::get('/', [OnboardingController::class, 'index'])->name('student.onboarding');
        Route::post('/set-password', [OnboardingController::class, 'storePassword'])->name('student.password.onboarding.store');
        Route::get('/skills', [OnboardingController::class, 'indexSkills'])->name('student.skills');
        Route::post('/skills', [OnboardingController::class, 'storeSkills'])->name('student.skills.store');
        Route::get('/experience', [OnboardingController::class, 'indexExperience'])->name('student.experience');
        Route::post('/set-experience', [OnboardingController::class,'storeExperience'])->name('student.experience.onboarding.store');
        Route::delete('/experience/{experience}', [OnboardingController::class, 'destroyExperience'])->name('student.experience.onboarding.destroy');
        Route::get('/project', [OnboardingController::class, 'indexProject'])->name('student.project');
        Route::post('/project', [OnboardingController::class, 'storeProject'])->name('student.project.onboarding.store');
        Route::delete('/project/{project}', [OnboardingController::class, 'destroyProject'])->name('student.project.destroy');
        Route::get('/certificate', [OnboardingController::class, 'indexCertificate'])->name('student.certificate');
        Route::post('/certificate', [OnboardingController::class, 'storeCertificate'])->name('student.certificate.onboarding.store');
        Route::delete('/certificate/{certificate}', [OnboardingController::class, 'destroyCertificate'])->name('student.certificate.onboarding.destroy');
    });
    Route::get('/cv', [CvController::class, 'index'])->name('student.cv');
    Route::post('/cv/upload', [CvController::class, 'upload'])->name('student.cv.upload');
    Route::get('/redirect', [CvController::class, 'redirect_to_dashboard'])->name('redirect_to_dashboard');

    // Student Profile Management Routes
    Route::prefix('student')->name('student.')->group(function () {
        // Experience Routes
        Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');
        Route::put('/experience/{experience}', [ExperienceController::class, 'update'])->name('experience.update');
        Route::delete('/experience/{experience}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

        // Project Routes
        Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
        Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

        // Certificate Routes
        Route::post('/certificate', [CertificateController::class, 'store'])->name('certificate.store');
        Route::put('/certificate/{certificate}', [CertificateController::class, 'update'])->name('certificate.update');
        Route::delete('/certificate/{certificate}', [CertificateController::class, 'destroy'])->name('certificate.destroy');

        // Skills Routes (handled by ProfileController)
        Route::post('/skills', [ProfileController::class, 'updateSkills'])->name('skills.store');
        Route::put('/skills', [ProfileController::class, 'updateSkills'])->name('skills.update');
    });

    Route::middleware('check.first.login')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.upload-photo');
        Route::put('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update-preferences', [ProfileController::class, 'updatePreferences'])->name('profile.update-preferences');

        // Student Routes
        Route::get('/internship', [InternshipController::class, 'index'])->name('internship');
        Route::get('/history', [HistoryController::class, 'index'])->name('history');
        Route::post('/profile/update-skills', [ProfileController::class, 'updateSkills'])->name('profile.update-skills');

        // Supervisor Routes
        Route::get('/company', [CompaniesController::class, 'index'])->name('company');
        Route::post('/profile/update-expertise-areas', [ProfileController::class, 'updateExpertiseAreas'])->name('profile.update-expertise-areas');
        Route::post('/profile/update-research-interests', [ProfileController::class, 'updateResearchInterests'])->name('profile.update-research-interests');

        // Admin Routes
        Route::get('/internship-management', [InternshipController::class, 'index'])->name('internship.management');
        Route::post('/internships', [InternshipController::class, 'store'])->name('internships.store');
        Route::get('/user-management', [ManagementController::class, 'index'])->name('user.management');
        Route::post('/user-management', [ManagementController::class, 'store'])->name('user.management.store');
        Route::put('/user-management/{id}', [ManagementController::class, 'update'])->name('user.management.update');
        Route::delete('/user-management/{id}', [ManagementController::class, 'destroy'])->name('user.management.destroy');
        Route::post('/admin/companies', [ManagementController::class, 'storeCompany'])->name('admin.companies.store');
        Route::put('/admin/companies/{id}', [ManagementController::class, 'updateCompany'])->name('admin.companies.update');
        Route::delete('/admin/companies/{id}', [ManagementController::class, 'destroyCompany'])->name('admin.companies.destroy');
        Route::put('/internships/{internship}', [InternshipController::class, 'update'])->name('internships.update');
        Route::delete('/internships/{internship}', [InternshipController::class, 'destroy'])->name('internships.destroy');

        Route::get('/detail-company/{company}', [CompaniesController::class, 'show'])->name('detail.company');

        Route::get('/detail-student/{slug}', [ProfileController::class, 'showStudent'])->name('detail.student');
        Route::get('/detail-supervisor/{slug}', [ProfileController::class, 'showSupervisor'])->name('detail.supervisor');

        Route::get('/detail-job/{slug}', [InternshipController::class, 'show'])->name('detail.job');

        Route::post('/internship/apply', [InternshipApplicationController::class, 'store'])->name('internship.apply');

        Route::get('/student-detail/{student?}', [StudentDetailController::class, 'show'])->name('student-detail');

        Route::get('/detail-application', function () {
            return view('stuinteradm');
        })->name('detail.application');

        // Route to show students for a closed internship
        Route::get('/internship/{id}/students', [InternshipApplicationController::class, 'showStudents'])->name('internship.students');

        // Route to show student application detail with internship
        Route::get('/student/{student}/internship/{internship}/detail', [InternshipApplicationController::class, 'showStudentApplicationDetail'])->name('student.application.detail');

        // Application approve/reject routes
        Route::put('/application/{application}/approve', [InternshipApplicationController::class, 'approveApplication'])->name('application.approve');
        Route::put('/application/{application}/reject', [InternshipApplicationController::class, 'rejectApplication'])->name('application.reject');

        // Student Log routes
        Route::post('/student-logs', [StudentLogController::class, 'store'])->name('student-logs.store');
        Route::get('/student-logs/by-date', [StudentLogController::class, 'getLogsByDate'])->name('student-logs.by-date');
        Route::get('/student-logs/{applicationId}', [StudentLogController::class, 'getLogsByApplication'])->name('student-logs.by-application');
        Route::post('/student-logs/{logId}/feedback', [StudentLogController::class, 'addSupervisorFeedback'])->name('student-logs.add-feedback');
        Route::get('/student-logs/{applicationId}/download-week/{startDate}', [StudentLogController::class, 'downloadLogsByWeek'])->name('student-logs.download-week');
        Route::get('/student-logs/{applicationId}/download-month/{yearMonth}', [StudentLogController::class, 'downloadLogsByMonth'])->name('student-logs.download-month');
    });
});
