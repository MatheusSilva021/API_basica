<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\sizes;
use Illuminate\Http\Request;

class sizesController extends Controller
{
    public function newSize(Request $request)
    {
        return response()->json(sizes::create($request->all()), 201);
    }

    public function getSizes()
    {
        return response()->json(sizes::all(), 200);
    }
}
