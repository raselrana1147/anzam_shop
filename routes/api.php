<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\EcommerceController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\WishlistController;



Route::group(['prefix' => 'auth'], function ($router) {

   Route::post('login', [AuthController::class, "login"]);
   Route::post('register',[RegisterController::class, "register"]);
   Route::post('logout', [AuthController::class, "logout"]);
    //Route::post('refresh', 'AuthController@refresh');
   Route::get('profile', [AuthController::class,"profile"]);

});


Route::group(['prefix' => 'ecommerce'], function ($router) {

   Route::get('slider', [EcommerceController::class, "slider"]);
   Route::get('category', [EcommerceController::class, "category"]);
   Route::get('sub_category/{id}', [EcommerceController::class, "sub_category"]);
   Route::get('brand', [EcommerceController::class, "brand"]);
   Route::post('whole_sale_product', [EcommerceController::class, "whole_sale_product"]);
   Route::get('featured_product', [EcommerceController::class, "featured_product"]);
   Route::get('recommended_product', [EcommerceController::class, "recommended_product"]);
   Route::get('featured_product_all', [EcommerceController::class, "featured_product_all"]);
   Route::get('trending_product', [EcommerceController::class, "trending_product"]);
   Route::get('trending_product_all', [EcommerceController::class, "trending_product_all"]);
   Route::get('best_sale_product', [EcommerceController::class, "best_sale_product"]);
   Route::get('best_sale_product_all', [EcommerceController::class, "best_sale_product_all"]);
   Route::get('new_arrival_product', [EcommerceController::class, "new_arrival_product"]);
   Route::get('new_arrival_product_all', [EcommerceController::class, "new_arrival_product_all"]);
   Route::get('flash_deal_product', [EcommerceController::class, "flash_deal_product"]);
   Route::get('flash_deal_product_all', [EcommerceController::class, "flash_deal_product_all"]);
   Route::get('product_detail/{id}', [EcommerceController::class, "product_detail"]);
   Route::get('brand_wise_product/{id}', [EcommerceController::class, "barnd_wise_product"]);
   Route::get('subcat_wise_product/{id}', [EcommerceController::class, "subcat_wise_product"]);
   Route::get('category_wise_product/{id}', [EcommerceController::class, "category_wise_product"]);
   Route::post('search_product', [EcommerceController::class, "search_product"]);
   Route::get('coupon_list/', [EcommerceController::class, "coupon_list"]);
   Route::post('apply_coupon/', [EcommerceController::class, "apply_coupon"]);

   // checkout order
   Route::post('checkout}', [CheckoutController::class, "checkout"]);


  //cart api
   Route::post('add_to_cart', [CartController::class, "add_to_cart"]);
   Route::get('cart_list', [CartController::class, "cart_list"]);
   Route::POST('cart_update', [CartController::class, "cart_update"]);
   Route::post('delete_cart', [CartController::class, "delete_cart"]);

    //wishlist api
    Route::post('add_to_wishlist', [WishlistController::class, "add_to_wishlist"]);
    Route::get('wishlist_list', [WishlistController::class, "wishlist_list"]);
    Route::post('delete_wishlist', [WishlistController::class, "delete_wishlist"]);

 // Checkout route
   Route::get('get_payment', [CheckoutController::class, "get_payment_list"]);
   Route::post('checkout', [CheckoutController::class, "checkout"]);
   Route::get('payment_confirm/{amount}', [CheckoutController::class, "payment_confirm"])->name('payment_confirm');



});
