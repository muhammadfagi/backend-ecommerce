<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $order = Order::all();
        return response()->json(['message' => 'Success', 'data' => $order]);
    }

    public function show($id) {
        $order = Order::find($id);
        return response()->json(['message' => 'Success', 'data' => $order]);
    }

    public function store(Request $request) {
        $order = Order::create($request->all());
        return response()->json(['message' => 'Create Success', 'data' => $order]);
    }

    public function update(Request $request, $id) {
        $order = Order::find($id);
        $order->update($request->all());
        return response()->json(['message' => 'Update Success', 'data' => $order]);
    }

    public function destroy($id) {
        $order = Order::find($id);
        $order->delete();
        return response()->json(['message' => 'Delete Success', 'data' => null]);
    }
}
