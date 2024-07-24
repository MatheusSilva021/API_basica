<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function getProducts()
    {
        return Products::all();
    }
}
