<?php

use App\Http\Controllers\ContactFormController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[ContactFormController::class,'show']);

Route::prefix('/user')->group(function(){
    Route::post('/forms',[ContactFormController::class,'store']);
    Route::post('forms/delete', [ContactFormController::class,'deleteform']);
});
