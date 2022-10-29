<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public Route
Route::post('/admin/login',[AuthController::class,'login']);
Route::post('/admin/register',[AuthController::class,'register']);
Route::get('/users',[ContactFormController::class,'show']);
Route::prefix('/user')->group(function(){
    Route::post('/forms',[ContactFormController::class,'store']);
    Route::post('forms/delete', [ContactFormController::class,'deleteform']);
});


// Protected Route
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/clients',[AuthController::class,'index']);
    Route::post('/clients/read/{id}',[AuthController::class,'read']);
    Route::get('/search',[AuthController::class,'search']);
    Route::get('/user', function() {
       return Auth::user()?? 'Logout User';
    });
    Route::get('/logout',[AuthController::class,'logout']);
});
