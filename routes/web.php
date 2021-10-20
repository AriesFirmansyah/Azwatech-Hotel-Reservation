<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
Auth::routes();


Route::get('/', [AllUserController::class, 'index']);
Route::get('/Login', [AllUserController::class, 'login']);
Route::get('/SignUp', [AllUserController::class, 'signup']);
Route::get('/about', [AllUserController::class, 'aboutUS']);
Route::get('/contact', [AllUserController::class, 'contactUS']);
Route::get('/hotel', [AllUserController::class, 'hotel']);
Route::post('/hotel', [AllUserController::class, 'hotelSearch']);
Route::get('/hotelDetails/{data}', [AllUserController::class, 'hotelDetails']);


Route::group(['middleware' => 'user'], function() {
    Route::get('/booking/{data}', [UserController::class, 'bookingForm']);
    Route::post('/doBooking/{data}', [UserController::class, 'booking']);
    Route::get('/transaction', [UserController::class, 'transaction']);
    Route::get('/invoice/{data}', [UserController::class, 'invoice']);
    Route::get('/EditProfile/{data}', [UserController::class, 'userEdit']);
    Route::post('/doUserEdit', [UserController::class, 'doUserEdit']);
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/adminTransaction', [AdminController::class, 'transaction']);
    Route::get('/adminHotel', [AdminController::class, 'hotel']);
    Route::patch('/updateHotel/{id}', [AdminController::class, 'updateHotel']);
    Route::delete('/deleteHotel/{data}', [AdminController::class, 'destroy']);
    Route::get('/adminAddHotel', [AdminController::class, 'addHotel']);
    Route::patch('/addHotel', [AdminController::class, 'doAddHotel']);
    Route::get('/adminListUser', [AdminController::class, 'listUser']);
});
