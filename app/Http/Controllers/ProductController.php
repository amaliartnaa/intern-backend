<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(Request $request) {
        // create new item
        $item = new Product;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stocks = $request->stocks;
        $item->save();

        return response()->json($item, 201);
    }

    public function index() {
        // get all items
        $item = Product::all();

        return response()->json($item, 200);
    }

    public function show($id) {
        // get item by Id
        $item = Product::find($id);

        if(!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($item, 200);
    }

    public function update(Request $request, $id) {
        // update item
        $item = Product::find($id);

        if(!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $item->name = $request->name;
        $item->price = $request->price;
        $item->stocks = $request->stocks;
        $item->save();

        return response()->json($item, 200);
    }

    public function destroy($id) {
        // delete item
        $item = Product::find($id);

        if(!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $item->delete();
        return response()->json('Item Successfully deleted', 200);
    }
}
