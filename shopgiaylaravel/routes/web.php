<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');


// danh mục sản phẩm  trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
// shoes category
Route::get('/shoes-category/{category_id}','CategoryProduct@shoes_category_home');
// shoes brand
Route::get('/shoes-brand/{brand_id}','BrandProduct@shoes_brand_home');
// shoes home
Route::get('/products','HomeController@product');
// chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');

// backend
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/admin','AdminController@index');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');



// category_product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');


// brand_product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');



// product
Route::get('/add-product','ProductController@add_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');



// images_product
Route::get('/add-images-product','ImageProduct@add_images_product');
Route::post('/save-images-product','ImageProduct@save_images_product');
Route::get('/all-images-product','ImageProduct@all_images_product');
Route::get('/edit-images-product/{images_id}','ImageProduct@edit_images_product');
Route::get('/delete-images-product/{images_id}','ImageProduct@delete_images_product');
Route::post('/update-images-product/{images_id}','ImageProduct@update_images_product');


// product_size
Route::get('/add-product-size','ProductSize@add_product_size');
Route::get('/all-product-size','ProductSize@all_product_size');
Route::get('/edit-product-size/{size_id}','ProductSize@edit_product_size');
Route::get('/delete-product-size/{size_id}','ProductSize@delete_product_size');
Route::post('/save-product-size','ProductSize@save_product_size');
Route::post('/update-product-size/{size_id}','ProductSize@update_product_size');



// checkout
Route::get('/register-checkout','CheckoutController@register_checkout');
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/login-customer','CheckoutController@login_customer');


// cart
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/update-cart','CartController@update_cart');


// contact
Route::get('/contact','Contact@contact');
