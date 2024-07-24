<?php

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\productsController as ProductsController;
use App\Http\Controllers\API\sizesController as SizesController;
use App\Http\Controllers\API\categoriesController as CategoriesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/sizeInsert',[SizesController::class, 'newSize']);
Route::post('/categoryInsert',[CategoriesController::class, 'newCategory']);
Route::get('/products', [ProductsController::class,'getProducts']);
