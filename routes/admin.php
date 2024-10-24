<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
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

/** Sub Category Routes. */
Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class)->except('show');

/** Child Category Routes. */
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-sub-categories', [ChildCategoryController::class, 'getSubCategories'])->name('get-sub-categories');
Route::resource('child-category', ChildCategoryController::class)->except('show');

/** Brand routes  */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class)->except('show');

/** Vendor Profile routes  */
Route::resource('vendor-profile', AdminVendorProfileController::class)->except('show');

/**  Products routes **/
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childcategories', [ProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::resource('products', ProductController::class)->except('show');