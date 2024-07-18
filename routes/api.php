<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::post('/product',[ProductController::class,'store']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{id}',[ProductController::class,'find']);
Route::put('/product/{id}',[ProductController::class,'update']);
Route::delete('product/{id}',[ProductController::class,'delete']);
