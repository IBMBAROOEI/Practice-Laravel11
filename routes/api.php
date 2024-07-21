<!-- <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('product')->group(function(){
Route::controller(ProductController::class)->group(function(){
 Route::post('/','store');
   Route::get('/','index');
   Route::get('/{product}','find');
   Route::put('/{product}','update');
   Route::delete('/{product}','delete');

   });
});

Route::prefix('categorei')->group(function(){
    Route::controller(CategorieController::class)->group(function(){
     Route::post('/','store');
       Route::get('/','index');
       Route::get('/{categorei}','find');
       Route::put('/{categorei}','update');
       Route::delete('/{categorei}','delete');

       });
    });




