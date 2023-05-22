<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories  = category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'name' => 'required', 
            'price' => 'required',
            'details' => 'required'
        ]);

        $item = new Item();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->details = $request->details;

        $item->save();
        return redirect()->route('item.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'name' => 'required', 
            'price' => 'required',
            'details' => 'required'
        ]);

        $item = Item::find($id);
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->details = $request->details;

        $item->save();
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::find($id)->delete();
        return redirect()->route('item.index');
    }
}
