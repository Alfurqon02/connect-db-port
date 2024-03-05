<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::with('categories')->get();
        // dd($item);
        return response()->json([
            'items' => $item
        ], 200);
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();
        return response()->json([
            'message' => 'Item deleted successfully'
        ], 200);
    }

    public function createItem(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
        $item->categories()->attach($request->category);
        return response()->json([
            'message' => 'Item created successfully'
        ], 200);
    }

    public function editItem(Request $request, $id)
    {
        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
        $item->categories()->sync($request->category);
        return response()->json([
            'message' => 'Item updated successfully'
        ], 200);
    }
}
