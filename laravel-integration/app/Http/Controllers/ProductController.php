<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Product added successfully',
            'product' => $product,
        ], 201);
    }

    public function getStockLevels()
    {
        return response()->json(Product::select('name', 'quantity')->get());
    }
}
