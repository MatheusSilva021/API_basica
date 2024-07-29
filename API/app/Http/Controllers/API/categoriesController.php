<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoriesController extends Controller
{
    public function newCategory(Request $request)
    {
        try {
            return response()->json(Categories::create($request->all()), 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateCategory(Request $request, int $id)
    {
        try {
            $category = Categories::where('category_ID', $id)->first();
            $category->fill($request->all());
            $category->save();

            return response()->json($category, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteCategory(int $id)
    {
        try{
            $category = Categories::where('category_ID', $id)->first();
            $category->delete();
            return response()->json(null, 204);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCategories()
    {
        try {
            return response()->json(Categories::all(), 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
