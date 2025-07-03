<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('members', 'dashboard.members')
    ->middleware(['auth', 'verified'])
    ->name('members');

Route::view('events', 'dashboard.events')
    ->middleware(['auth', 'verified'])
    ->name('events');

Route::view('attendance', 'dashboard.attendance')
    ->middleware(['auth', 'verified'])
    ->name('attendance');

Route::view('finances', 'dashboard.finances')
    ->middleware(['auth', 'verified'])
    ->name('finances');

Route::view('expense', 'dashboard.expense')
    ->middleware(['auth', 'verified'])
    ->name('expense');

Route::view('report', 'dashboard.report')
    ->middleware(['auth', 'verified'])
    ->name('report');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
