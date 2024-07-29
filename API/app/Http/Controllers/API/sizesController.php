<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\sizes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class sizesController extends Controller
{
    public function newSize(Request $request)
    {
        try {
            return response()->json(sizes::create($request->all()), 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateSize(Request $request, int $id)
    {
        try {
            $size = sizes::where('size_ID', $id)->first();
            $size->fill($request->all());
            $size->save();

            return response()->json($size, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteSize(int $id)
    {
        try{
            $size = sizes::where('size_ID', $id)->first();
            $size->delete();
            return response()->json(null, 204);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getSizes()
    {
        try {
            return response()->json(sizes::all(), 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
