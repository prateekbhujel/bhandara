<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::get('dashboard', [AdminController::class, 'dashbaord'])->name('dashboard');
// profile Routes 
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('password/update', [ProfileController::class, 'updatePassword'])->name('password.update');

/** Slider Rresource Routes **/
Route::resource('slider', SliderController::class)->except('show');

/** Category Routes and Subcategory Routes. *
 * Alwyas registerd the route right before the category resource route.
*/
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class)->except('show');

/** Subcategory Routes. */
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class)->except('show');