<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix'=>'chef'],function(){
	Route::post('/login', [ApiController::class, 'chef_login']);
	Route::post('/forgot-password',[ApiController::class, 'chef_forgot_password']); 
	Route::post('/reset-password',[ApiController::class, 'chef_reset_password']); 
	Route::post('/logout',[ApiController::class, 'chef_logout']); 
	Route::post('/register', [ApiController::class, 'chef_registration']);
	Route::post('/get-profile',[ApiController::class, 'chef_profile']); 
});






Route::group(['prefix'=>'user'],function(){
	Route::post('/login', [ApiController::class, 'user_login']);
	Route::post('/register', [ApiController::class, 'user_registration']);
	Route::post('/forgot-password',[ApiController::class, 'user_forgot_password']); 
	Route::post('/reset-password',[ApiController::class, 'user_reset_password']); 
	Route::post('/logout',[ApiController::class, 'user_logout']); 
	Route::post('/get-profile',[ApiController::class, 'user_profile']); 
});
