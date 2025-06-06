<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\ProfileController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Password Reset Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('otp.show');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('otp.verify');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// PROTECTED ROUTES (Require Authentication)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.upload-photo');
    Route::put('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


    // Student Routes
    Route::get('/internship', [InternshipController::class, 'index'])->name('internship');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');

    // Supervisor Routes
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/student-detail', function () {
        return view('studup');
    })->name('student-detail');
    Route::post('/profile/update-expertise-areas', [ProfileController::class, 'updateExpertiseAreas'])->name('profile.update-expertise-areas');
    Route::post('/profile/update-research-interests', [ProfileController::class, 'updateResearchInterests'])->name('profile.update-research-interests');

// Supervisor Routes
Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/student-detail', function () {
    return view('studup');
})->name('student-detail');

Route::get('/detail-job', function () {
    return view('interman');
})->name('detail.job');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/internship-management', function () {
    return view('interadm');
})->name('internship.management');

Route::get('/detail-company', function () {
    return view('company');
})->name('detail.company');

Route::get('/detail-application', function () {
    return view('stuinteradm');
})->name('detail.application');

Route::get('/user-management', function () {
    return view('manage');
});

