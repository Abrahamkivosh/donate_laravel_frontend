<?php

use App\Http\Controllers\CompaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PredictionLogController;
use App\Http\Controllers\users\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageControl;

require __DIR__ . '/auth.php';

Route::get('/', [PageControl::class, 'index'])->name('page.index');
Route::get('/donate', [PageControl::class, 'donate'])->name('page.donate');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('compaigns', CompaignController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('predictions', PredictionLogController::class);
    Route::resource('users', DashboardController::class);

    //compaigns.notify-users
    Route::get('compaigns.notify-users', [CompaignController::class, 'notifyUsers'])->name('compaigns.notify-users');


    //sync predictions logs
    // Route::get('predictions-sync', [PredictionLogController::class, 'syncPredictions'])->name('predictions.sync');
});
