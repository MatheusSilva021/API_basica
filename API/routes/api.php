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


// GET Routes
Route::get('/products', [ProductsController::class,'getProducts']);
Route::get('/product/{id}', [ProductsController::class,'getProduct']);
Route::get('/sizes', [SizesController::class,'getSizes']);
Route::get('/categories', [CategoriesController::class,'getCategories']);

// POST Routes
Route::post('/sizeInsert',[SizesController::class, 'newSize']);
Route::post('/categoryInsert',[CategoriesController::class, 'newCategory']);
Route::post('/productInsert',[ProductsController::class, 'newProduct']);

// PUT Routes
Route::put('/sizeUpdate/{id}',[SizesController::class,'updateSize']);
Route::put('/categoryUpdate/{id}',[CategoriesController::class,'updateCategory']);
Route::put('/productUpdate/{id}',[ProductsController::class,'updateProduct']);

// DELETE Routes
Route::delete('/sizeDelete/{id}',[SizesController::class,'deleteSize']);
Route::delete('/categoryDelete/{id}',[CategoriesController::class,'deleteCategory']);
Route::delete('/productDelete/{id}',[ProductsController::class,'deleteProduct']);
