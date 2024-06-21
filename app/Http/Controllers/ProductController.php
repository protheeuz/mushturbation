<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return view('pages.products.index', compact('items'));
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(string $id)
    {
        $item = Product::findOrFail($id);
        return view('pages.products.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $item = Product::findOrFail($id);
        $item->update($data);
        return redirect()->route('products.index');
    }

    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('products.index');
    }
}
