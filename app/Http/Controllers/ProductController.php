<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create(Request $request)
    {
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'detail' => 'required',
            'file' => 'required|image'
            ],
        );

        if($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $fileName);
        }

        Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'image' => $fileName,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'name' => 'required',
            'detail' => 'required',
            'file' => 'required|image'
            ],
        );

        if($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $fileName);
        }

        $product = Product::find($id);
        // https://www.youtube.com/watch?v=NQtAKbygGCc   21 : 50
    }
}
