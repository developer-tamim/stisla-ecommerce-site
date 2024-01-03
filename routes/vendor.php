<?php

// Vendor routes

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\vendorProductController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;


// vendor routes
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('/profile',[VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile',[VendorProfileController::class, 'updatePassword'])->name('profile.update.password');

// vendor shop profile
Route::resource('shop-profile', VendorShopProfileController::class);

// product route
Route::get('get-subcategories', [vendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('get-childcategories', [vendorProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::resource('product', vendorProductController::class);
