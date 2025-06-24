<?php

use App\Http\Controllers\LeaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/dashboard/members', [LeaderController::class, 'index']);

Route::get('/dashboard/events', function () {
    return view('dashboard.events');
});

Route::get('/dashboard/attendance', function () {
    return view('dashboard.attendance');
});

Route::get('/dashboard/finances', function () {
    return view('dashboard.finances');
});

Route::get('/dashboard/expense', function () {
    return view('dashboard.expense');
});

Route::get('/dashboard/report', function () {
    return view('dashboard.report');
});
// Route::get('/dashboard/leader/{id}', function ($id) {
//     return view('leader.show', ["id" => $id]);
// });