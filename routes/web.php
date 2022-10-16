<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/items', [ProductController::class,'index']);

// Route::prefix('/item')->group(function(){
//    Route::post('/create',[ProductController::class,'store']);
//    Route::post('/test',[ProductController::class,'test']);
//    Route::put('/{id}',[ProductController::class,'update']);
//    Route::delete('/{id}',[ProductController::class,'destroy']);
// });
