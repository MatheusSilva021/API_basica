<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\sizes;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product_images;
use Illuminate\Support\Facades\Storage;

class productsController extends Controller
{
    public function getProducts()
    {
        try {
            return response()->json(Products::with(['productCategories', 'productSizes', 'productImages'])->get(), 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getProduct(int $id)
    {
        try {
            return response()->json(Products::where('product_ID', '=', $id)->with(['productCategories', 'productSizes', 'productImages'])->first(), 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function newProduct(Request $request)
    {
        try {
            $product_Info = [
                "product_Name" => $request->product_Name,
                "product_Description" => $request->product_Description,
                "quantity_in_stock" => $request->quantity_in_stock,
                "Price" => $request->Price,
                "Discount" => $request->Discount,
            ];

            $sizes = $request->product_Sizes;
            $categories = $request->product_Categories;
            $images = $request->product_Images;
            $product = Products::create($product_Info);

            foreach ($sizes as $size) {
                $size_ID = sizes::where('Size', $size)->first();
                $product->productSizes()->attach($size_ID);
            }

            foreach ($categories as $category) {
                $category_ID = Categories::where('category_Name', $category)->first();
                $product->productCategories()->attach($category_ID);
            }

            foreach ($images as $image) {
                $path = $image->store('images', 'public');
                $product->productImages()->create(['image_Url' => $path]);
            }

            return response()->json($product, 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateProduct(Request $request, int $id)
    {
        try {
            $product = Products::findOrFail($id);
            $product->update([
                "product_Name" => $request->product_Name,
                "product_Description" => $request->product_Description,
                "quantity_in_Stock" => $request->quantity_in_Stock,
                "Price" => $request->Price,
                "Discount" => $request->Discount,
            ]);

            if ($request->product_Categories) {
                $categories = $request->product_Categories;
                $categories_ID = [];
                foreach ($categories as $category) {
                    $category_ID = Categories::where('category_Name', $category)->first();
                    if ($category_ID) {
                        $categories_ID[] = $category_ID->category_ID;
                    }
                }
                $product->productCategories()->sync($categories_ID);
            }

            if ($request->product_Sizes) {
                $sizes = $request->product_Sizes;
                $size_IDs = [];
                foreach ($sizes as $size) {
                    $size_ID = sizes::where('Size', $size)->first();
                    if ($size_ID) {
                        $size_IDs[] = $size_ID->size_ID;
                    }
                }
                $product->productSizes()->sync($size_IDs);
            }

            return response()->json($product, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteProduct(int $id)
    {
        try {
            $product = Products::where('product_ID', $id)->first();

            $image_path = product_images::where('product_ID', $id)->first();

            if ($image_path) {
                Storage::disk('public')->delete($image_path->image_Url);
            }

            $product->delete();
            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
