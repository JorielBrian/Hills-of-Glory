<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Front Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard
Route::view('dashboard', 'dashboard.dashboard')
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
