<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json("Product not found", 404);
        }

        return $product;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json("Product not found", 404);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->update();

        return response()->json($product, 200);
    }

    public function destroy($id)
    {

        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json("Product not found", 404);
        }

        $product->delete();

        return response()->json("El producto fue eliminado", 200);
    }
}
