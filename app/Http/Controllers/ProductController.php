<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::all();
        $hero_bg = '8.jpg';
        $col_bg_1 = '12.jpg';
        $col_bg_2 = 'Frame 5.png';

        return view("home.index", compact('hero_bg', 'col_bg_1', 'col_bg_2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'price' => 'required|numeric|decimal:0,2',
            'description' => 'nullable|string|min:5',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp,ico,svg,jiff|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('product_images', 'public');
        }

        Product::create($validated);
        session([
            'status' => 'success',
            "message"=>"product creation was successful"
        ]);

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
