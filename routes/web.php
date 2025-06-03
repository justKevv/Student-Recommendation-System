<?php

use Illuminate\Support\Facades\Route;

// STUDENT

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile', function () {
    return view('profup');
})->name('profile');

Route::get('/internship', function () {
    return view('compup');
})->name('internship');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/student-detail', function () {
    return view('studup');
})->name('student-detail');

// AUTH

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', function () {
    return "log";
});
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->name('password.request');
Route::post('/forgot-password', function () {
    return view('auth.passwords.email');
})->name('password.email');

Route::get('/verify-otp', function () {
    return view('auth.passwords.verify-otp');
})->name('otp.show');
Route::post('/verify-otp', function () {
    return "verify otp";
})->name('otp.verify');

Route::get('/reset-password/{token}', function () {
    return view('auth.passwords.reset');
})->name('password.reset');
Route::post('/reset-password', function () {
    return "reset password";
})->name('password.update');

Route::get('/compup', function () {
    return view('compup');
})->name('compup');

Route::get('/profup', function () {
    return view('profup');
})->name('profup');

Route::get('/studup', function () {
    return view('studup');
})->name('studup');

Route::get('/interadm', function () {
    return view('interadm');
})->name('interadm');

Route::get('/interman', function () {
    return view('interman');
})->name('interman');

Route::get('/detailcompany', function () {
    return view('detailcompany');
})->name('detailcompany');

