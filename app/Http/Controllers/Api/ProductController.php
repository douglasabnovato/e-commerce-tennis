<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtro por marca
        if ($request->has('brand')) {
            $query->where('brand', $request->brand);
        }

        $products = $query->paginate(10);

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('sizes')->findOrFail($id);

        return response()->json($product);
    }
}
