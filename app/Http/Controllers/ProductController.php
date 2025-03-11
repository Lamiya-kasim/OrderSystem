<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    // Fetch all products
    public function index() {
        return response()->json(Product::all(), 200);
    }

    // Add a new product
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json($product, 201);
    }
}

