<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;

// Admin routes
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');


// profile rourte
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// slider route
Route::resource('slider', SliderController::class);

// category route
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

// sub category route
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

// child category route
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategory'])->name('getsubcategories');
Route::resource('child-category', ChildCategoryController::class);

// brand route
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

// vendor profile route
Route::resource('vendor-profile', AdminVendorProfileController::class);

// product route
Route::get('get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('get-childcategories', [ProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::resource('product', ProductController::class);

// product image gallery route
Route::resource('product-image-gallery', ProductImageGalleryController::class);

// product variant route
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);

// product variant item route
Route::put('product-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::put('product-variant-item/{variantId}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
// Route::resource('product-variant', ProductVariantItemController::class);

