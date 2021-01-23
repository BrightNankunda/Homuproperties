<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() 
    {
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
            
        ]);

        return response()->json([
            'status' => (bool) $product,
            'data' => $product,
            'message' => $product ? 'Product Crreated' : 'Error Please dont create another one'
        ]);
    }

    public function show(Product $product)
    {
        return response()->json($product,200);
    }

    public function update(Request $request, Product $product)
    {
        $status = $product->update(
            $request->only(['name', 'price', 'description'])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Updated!' : 'Error Donot update again'
        ]);
    }

    public function destroy(Product $product)
    {
        $status = $product->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Deleted!' : 'Error Donot delete again'
        ]);
    }
    
}
