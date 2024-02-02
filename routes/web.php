<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\productManagmentController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\cokkieController;
/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------product_detail--------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [users::class,"welcome"]);

Route::get('/product_detail/{id}',[users::class,"productDetail"])->name('product_detail');
Route::get('/login',[LoginController::class,"userLogin"])->name('login');
Route::post('/login_atempt',[LoginController::class,"login"])->name('login_attempt');
Route::get('/signup',[RegisterController::class,"userSignup"]);
Route::post('/signup',[RegisterController::class,"Signup"])->name('signup');
Route::get('/all_product',[users::class,"totalProduct"]);
Route::get('/checkout',[users::class,"checkoutPage"]);
Route::get('/contact_us',[users::class,"contactusPage"]);


// ------logout user-------

Route::get('/signout', [AuthController::class,"signout"])->name('signout');


// ------logout user ends----

// -------------------- user Profile related route ----------------
Route::get('/user_profile',[users::class,"profilePage"]);
Route::get('/edit_userprofile',[users::class,"editUserProfilePage"])->name('edit_userprofile');
Route::post('/update_userprofile',[users::class,"updateUserProfilePage"])->name('update_userprofile');
// --------------------

// ---product added to checkout---
// Route::post('/users_choice',[users::class,"usersChoice"])->name('users_choice');
Route::post('/add_to_cart/', [users::class,"addToCart"])->name('add_toCart');

// Route::post('/add_toCart/{id}',[users::class,"addToCart"])->name('add_toCart');
Route::post('/addToWish',[users::class,"addToWish"])->name('addToWish');


// ---------------Admin --controller----
Route::get('/dashboard',[adminController::class,"adminDashboardPage"]);

// -------------------


// -----------------file handling-----------
// routes/web.php

use App\Http\Controllers\FileController;

Route::get('/file/{filename}', [FileController::class, 'show']);
// ----------------------------------------------------


// ----------------------product adding section
Route::get('/add_product',[productManagmentController::class,"addProductPage"]);
Route::post('/product_add',[productManagmentController::class,"addProduct"])->name('product_add');

Route::get('/product_table',[productManagmentController::class,"ProductPage"]);
Route::get('/get-products',[productManagmentController::class,"ajaxAllProduct"])->name('get.products');


// razor payment -----------------------



Route::get('/razorpay', [RazorpayController::class, 'showPaymentForm']);
Route::post('/razorpay/payment', [RazorpayController::class, 'initiatePayment'])->name('razorpay.payment');


// cookie controller---------------------
Route::controller(cokkieController::class)->group(function () {
   
    Route::post('/cookie_cart/{productId}', 'storeDataInCookie')->name('cookie_cart');
});