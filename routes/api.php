<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;


Route::get('/products/sort/{sort}',[ProductsController::class,'index']);
Route::get('/products/{id}',[ProductsController::class,'show']);
Route::post('/products',[ProductsController::class,'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
