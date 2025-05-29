<?php

use Illuminate\Support\Facades\Route;

// STUDENT

Route::get('/dashboard', function () {
    return view('dashup');
})->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/internship', function () {
    return view('internship');
})->name('internship');

Route::get('/history', function () {
    return view('history');
})->name('history');

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
