<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/apartmentlist', [HomeController::class, 'apartmentList'])->name('apartmentlist');
Route::get('/apartmentdetails/{apartment}', [HomeController::class, 'apartmentdetails'])->name('apartmentdetails');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/apartment/create', [ApartmentController::class, 'create'])
->name('apartment.create');
Route::get('/apartment', [ApartmentController::class, 'index'])->name('apartment');
Route::post('/apartment', [ApartmentController::class, 'store']); 
Route::get('/apartment/show/{apartment}', [ApartmentController::class, 'show'])->name('apartments.show'); 
Route::get('/apartment/{apartment}', [ApartmentController::class, 'edit'])->name('apartments.edit');
Route::POST('/apartment/{apartment}', [ApartmentController::class, 'update'])->name('apartments.update');
Route::delete('/apartment/{apartment}', [ApartmentController::class, 'destroy'])->name('apartment.destroy');

Route::post('/comment/{apartment}/create',
 [CommentController::class, 'store'])->name('comment.create');

 Route::post('/booking/{apartment}/create',
 [BookingController::class, 'store'])->name('booking.create');
 Route::delete('/booking/{booking}//destroy',
 [BookingController::class, 'destroy'])->name('booking.destroy');



Route::get('/coupon/create', [CouponController::class, 'create'])
->name('coupon.create');
Route::get('/coupon', [CouponController::class, 'index'])->name('coupon');
Route::post('/coupon', [CouponController::class, 'store']); 
Route::get('/coupon/{coupon}', [CouponController::class, 'show'])->name('coupons.show');  

Route::delete('/coupon/{coupon}', [CouponController::class, 'destroy'])->name('coupon.destroy');

 