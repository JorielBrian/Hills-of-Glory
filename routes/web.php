<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Front Page
Route::get('/', function () {
    return view('homepage.welcome');
})->name('home');

Route::get('/about', function () {
    return view('homepage.about');
})->name('about');

Route::get('/services', function () {
    return view('homepage.services');
})->name('services');

Route::get('/connect', function () {
    return view('homepage.connect');
})->name('connect');

// Ministries
Route::get('/ministries/admin_and_extension', function () {
    return view('homepage.ministries.administration');
})->name('admin and extension');

Route::get('/ministries/consolidation', function () {
    return view('homepage.ministries.consolidation');
})->name('consolidation');

Route::get('/ministries/creative', function () {
    return view('homepage.ministries.creative');
})->name('creative');

Route::get('/ministries/education', function () {
    return view('homepage.ministries.education');
})->name('education');

Route::get('/ministries/events', function () {
    return view('homepage.ministries.events');
})->name('events ministry');

Route::get('/ministries/finance', function () {
    return view('homepage.ministries.finance');
})->name('finance ministry');

Route::get('/ministries/kids', function () {
    return view('homepage.ministries.hills_kids');
})->name('hills kids');

Route::get('/ministries/hospitality', function () {
    return view('homepage.ministries.hospitality');
})->name('hospitality');

Route::get('/ministries/music_and_arts', function () {
    return view('homepage.ministries.music_and_arts');
})->name('music and arts');

// Dashboard
Route::view('dashboard', 'dashboard.index')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Members
Route::get('/members', [MemberController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('members');

// Events
Route::view('events', 'dashboard.events')
    ->middleware(['auth', 'verified'])
    ->name('events');

// Attendance
Route::view('attendance', 'dashboard.attendance')
    ->middleware(['auth', 'verified'])
    ->name('attendance');

// Finances
Route::view('finances', 'dashboard.finances')
    ->middleware(['auth', 'verified'])
    ->name('finances');

// Expense
Route::view('expense', 'dashboard.expense')
    ->middleware(['auth', 'verified'])
    ->name('expense');

// Report
Route::view('report', 'dashboard.report')
    ->middleware(['auth', 'verified'])
    ->name('report');

// Settings (User)
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
