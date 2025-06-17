<?php

use App\Http\Controllers\LeaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [LeaderController::class, 'index']);

Route::get('/dashboard/leader/{id}', function ($id) {
    return view('leader.show', ["id" => $id]);
});

Route::get('/dashboard/leader', function () {
    return view('dashboard.member');
});
