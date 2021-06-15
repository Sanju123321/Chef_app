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


Route::post('/login', [ApiController::class, 'user_login']);

Route::post('/user/forgot-password',[ApiController::class, 'forgot_password']); 

Route::post('/user/reset-password',[ApiController::class, 'reset_password']); 

Route::post('/user/logout',[ApiController::class, 'logout']); 

Route::post('/user/register', [ApiController::class, 'user_registration']);

Route::post('/user/get-profile',[ApiController::class, 'profile']); 
