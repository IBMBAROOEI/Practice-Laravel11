<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::controller(ProductController::class)->group(function(){
 Route::post('/product','store');
Route::get('/product','index');
Route::get('/product/{product}','find');
Route::put('/product/{product}','update');
Route::delete('product/{product}','delete');

});

