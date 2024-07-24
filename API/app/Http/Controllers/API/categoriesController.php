<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function newCategory(Request $request)
    {
       return response()->json(Categories::create($request->all()),201);
    }
}
