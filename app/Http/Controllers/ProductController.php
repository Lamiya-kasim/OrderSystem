<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Cache::remember('products', 600, function () {
            return Product::all();
        });

        return response()->json($products);
    }
}
