<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use Illuminate\Support\Facades\Route;

// Vendor Routes 
Route::get('dashboard', [VendorController::class, 'dashbaord'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [ VendorProfileController::class, 'update'])->name('profile.update');
Route::post('profile', [ VendorProfileController::class, 'updatePassword'])->name('password.update');