<?php

use App\Http\Controllers\CompaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PredictionLogController;
use App\Http\Controllers\users\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.welcome');
});
require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('compaigns', CompaignController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('predictions', PredictionLogController::class);
    Route::resource('users', DashboardController::class);
});
