<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
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

    public function edit($id)
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
            ],
        );

        $fileName = ''; 
        if($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $fileName);
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->detail = $request->detail;

        if(!empty($fileName)) {
            $product->image = $fileName;
        }

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    public function destroy($id) 
    {
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product deleted.');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
}
