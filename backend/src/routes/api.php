<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserPreferenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(UserController::class)->group(function(){
    Route::post('registration', 'registration');
    Route::post('login', 'loginUser');  
});


Route::controller(UserController::class)->group(function(){
    Route::get('user', 'getuserInfo');
    Route::put('profile/{user}', 'profileUpdate');
    Route::patch('profile-update/{user}', 'profileUpdate');
    Route::get('logout', 'userLogout');
})->middleware('auth.api');


Route::controller(UserPreferenceController::class)->group(function(){
    Route::get('preference', 'index');
    Route::post('preference', 'store');
    Route::get('preference/{preference}', 'show');
    Route::put('preference/{preference}', 'update');
    Route::patch('preference/{preference}', 'update');
    Route::delete('preference/{preference}', 'destroy');
    Route::get('news-feed/{user}', 'newsFeed');
})->middleware('auth.api');

Route::controller(UserPreferenceController::class)->group(function(){
    Route::get('all-news', 'allNews');
});
