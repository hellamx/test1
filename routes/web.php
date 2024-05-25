<?php

use App\Http\Controllers\AvailabilityController;
use Illuminate\Support\Facades\Route;

Route::get('/check-availability', [AvailabilityController::class, 'checkDb'])->name('checkDb');

Route::get('/get-date', fn () => date('H:i:s, D'))->name('get-date');

Route::get('/get-redirect', fn () => redirect('get-date'));
