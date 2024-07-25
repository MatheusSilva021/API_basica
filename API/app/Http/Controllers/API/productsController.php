<?php

namespace App\Http\Controllers\API;

use App\Models\sizes;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productsController extends Controller
{
    public function getProducts()
    {
        return response()->json(Products::with(['productCategories', 'productSizes'])->get(), 200);
    }

    public function getProduct(int $id)
    {
        return response()->json(Products::where('product_ID','=',$id)->with('productSizes')->get(),200);
    }

    public function newProduct(Request $request){
        $product_Info = [
            "product_Name" => $request->product_Name,
            "product_Description" => $request->product_Description,
            "quantity_in_stock" => $request->quantity_in_stock,
            "Price" => $request->Price,
            "Discount" => $request->Discount,
        ];

        $sizes = explode(", ", $request->product_Sizes);
        $categories = explode(", ", $request->product_Categories);
        $images = explode(", ", $request->product_Images);
        $sizes_id = [];
        $categories_id = [];

        foreach($sizes as $size){
            $size_ID = sizes::where('Size',$size)->first();
            $sizes_id[] = $size_ID->size_ID;
        }

        foreach($categories as $category){
            $category_ID = Categories::where('category_Name',$category)->first();
            $categories_id[] = $category_ID->category_ID;
        }

        $product = Products::create($product_Info);

        foreach($sizes_id as $id){
            $product->productSizes()->attach($id);
        }

        foreach($categories_id as $id){
            $product->productCategories()->attach($id);
        }

        foreach($images as $image){
            $product->productImages()->create(['image_Url' => $image]);
        }

        return response()->json($product, 201);
    }
}
