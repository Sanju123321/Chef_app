<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\apis\CommonController;
use App\Http\Controllers\apis\ChefController;


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
	Route::post('/update-profile',[ApiController::class, 'chef_update_profile']); 


	// ------------ Add dishes ---------------------------
	Route::post('/add-dish',[ChefController::class, 'add_dish']); 
	Route::post('/edit-dish',[ChefController::class, 'edit_dish']); 
	Route::post('/delete-dish',[ChefController::class, 'delete_dish']); 

	Route::post('/dish-list',[ChefController::class, 'dish_listing']);
	Route::post('/dish-search',[ChefController::class, 'dish_searching']);
	Route::post('/dish-sorting',[ChefController::class, 'dish_sorting']);

	// ------------ Add dishes ---------------------------

});





Route::post('/get_list', [ChefController::class, 'get_list']);


Route::get('/country-list', [CommonController::class, 'country_list']);

Route::get('/banner-list', [CommonController::class, 'banner_list']);

Route::post('/chef/listing', [CommonController::class, 'chef_listing']);
Route::get('/chef/{chef_id}', [CommonController::class, 'chef_details']);


Route::post('/dish/listing', [CommonController::class, 'dish_listing']);
Route::get('/dish/{dish_id}', [CommonController::class, 'dish_details']);
Route::post('/dish-search',[ChefController::class, 'dish_searching']);


Route::group(['prefix'=>'user'],function(){
	Route::post('/login', [ApiController::class, 'user_login']);
	Route::post('/register', [ApiController::class, 'user_registration']);
	Route::post('/forgot-password',[ApiController::class, 'user_forgot_password']); 
	Route::post('/reset-password',[ApiController::class, 'user_reset_password']); 
	Route::post('/logout',[ApiController::class, 'user_logout']); 
	Route::post('/get-profile',[ApiController::class, 'user_profile']); 
	Route::post('/update-profile',[ApiController::class, 'user_update_profile']);


});
