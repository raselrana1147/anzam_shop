<?php

use Illuminate\Support\Facades\Route;
//==================Seller=============
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\Auth\LoginController;
use App\Http\Controllers\Seller\Auth\RegisterController;

use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerGalleryController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------
|
*/
Route::group(['prefix'=>'seller'],function(){

	Route::get('dashboard',[SellerController::class,'index'])->name('seller.dashboard');
	// Authenticate Routes
	Route::get('login',[LoginController::class,'showLoginForm'])->name('seller.login');
	Route::post('login',[LoginController::class,'login'])->name('seller.login');
	Route::post("seller_logout",[LoginController::class,'logout'])->name('seller.logout');
    Route::get('register',[RegisterController::class,'showRegistrationForm'])->name('seller.register');
	Route::post('register',[RegisterController::class,'register'])->name('seller.register.submit');

	// Product Routes
	Route::get('load_product',[SellerProductController::class,'datatable'])->name('seller.load_product');
	Route::get('product_list',[SellerProductController::class,'index'])->name('seller.product_list');
	Route::get('product_create',[SellerProductController::class,'create'])->name('seller.product_create');
	Route::post('product_store',[SellerProductController::class,'store'])->name('seller.product_store');
	Route::get('product_edit/{slug}',[SellerProductController::class,'edit'])->name('seller.product_edit');
	Route::post('product_update',[SellerProductController::class,'update'])->name('seller.product_update');
	Route::get('product_detail/{slug}',[SellerProductController::class,'product_detail'])->name('seller.product_detail');
	Route::post('product_delete',[SellerProductController::class,'delete'])->name('seller.product_delete');
	Route::post('update_product_status',[SellerProductController::class,'update_product_status'])
	->name('seller.update_product_status');
	Route::post('show_product_status',[SellerProductController::class,'show_product_status'])
	->name('seller.show_product_status');
	Route::post('show_flash_deal',[SellerProductController::class,'show_flash_deal'])
	->name('seller.show_flash_deal');
	Route::post('set_flash_deal',[SellerProductController::class,'set_flash_deal'])
	->name('seller.set_flash_deal');


	 //Product Gallery
	Route::get('gallery_list/{id}',[SellerGalleryController::class,'index'])->name('seller.gallery_list');
	Route::post('gallery_store',[SellerGalleryController::class,'store'])->name('seller.gallery_store');
	Route::get('gallery_edit/{id}',[SellerGalleryController::class,'edit'])->name('seller.gallery_edit');
	Route::post('gallery_update',[SellerGalleryController::class,'update'])->name('seller.gallery_update');
	Route::post('gallery_delete',[SellerGalleryController::class,'delete'])->name('seller.gallery_delete');

	//Orders Routes
	Route::get('load_order',[SellerOrderController::class,'datatable'])->name('seller.load_order');
	Route::get('order_list',[SellerOrderController::class,'index'])->name('seller.order_list');
	Route::get('order_detail/{id}',[SellerOrderController::class,'order_detail'])->name('seller.order_detail');


	// Profile Routes
	Route::get('password_form',[SellerProfileController::class,'password_form'])->name('seller.password_form');
	Route::post('change_password',[SellerProfileController::class,'change_password'])->name('seller.change_password');
	Route::get('profile_form',[SellerProfileController::class,'profile_form'])->name('seller.profile_form');
	Route::post('change_profile',[SellerProfileController::class,'change_profile'])->name('seller.change_profile');
		
});









