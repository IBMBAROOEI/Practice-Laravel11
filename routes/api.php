<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TagController;

Route::get('/user', function (Request $request) {
   return $request->user();
})->middleware('auth:sanctum');


Route::prefix('product')->group(function () {
   Route::controller(ProductController::class)->group(function () {
      Route::post('/', 'store');
      Route::get('/', 'index');
      Route::get('/{product}', 'find');
      Route::put('/{product}', 'update');
      Route::delete('/{product}', 'delete');
   });
});

Route::prefix('categorie')->group(function () {
   Route::controller(CategorieController::class)->group(function () {
      Route::post('/', 'store');
      Route::get('/', 'index');
      Route::get('/{categorie}', 'find');
      Route::put('/{categorie}', 'update');
      Route::delete('/{categorie}', 'delete');
   });
});

Route::prefix('tag')->group(function () {
   Route::controller(TagController::class)->group(function () {
      Route::post('/', 'store');
      Route::get('/', 'index');
      Route::get('/{tag}', 'find');
      Route::put('/{tag}', 'update');
      Route::delete('/{tag}', 'delete');
   });
});
