<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('login', 'AuthController@login');
// Route::post('register', 'AuthController@register');

// Route::get('/check-otp/', 'AuthController@checkOtp');




Route::group(['middleware' => ['auth:sanctum','throttle:500,1']], function () {

	Route::get('/get-all-question', 'QuestionController@getQuestions');
	
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
