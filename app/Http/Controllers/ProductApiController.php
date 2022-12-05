<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductApiController extends Controller
{
    public function bookAuth() {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }
    public function index() {
        // $category_name = Product::with('category')->get();
        // $product = Product::with(['category' => function($query) {
        //     $query->where('name', '=', 'category:id');
        // }])->get();

        // $product = Product::with('category')->get()->pluck('category', );
        $product = Product::with('category')->get();
        return response()->json(['message' => 'Success', 'data' => $product]);
    }

    public function show($id) {
        $product = Product::find($id);
        return response()->json(['message' => 'Success', 'data' => $product]);
    }

    public function store(Request $request) {
        $product = Product::create($request->all());
        return response()->json(['message' => 'Create Success', 'data' => $product]);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json(['message' => 'Update Success', 'data' => $product]);
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message' => 'Delete Success', 'data' => null]);
    }
}
