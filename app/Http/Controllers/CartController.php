<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cart = Session::get('cart', []);
        unset($cart['3']);
        return view('cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = Session::get('cart', []);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += (int)$quantity; // Increment quantity if exists
        } else {
            $cart[$productId]['name'] = $product->name;
            $cart[$productId]['quantity'] = $quantity; // Add new item
            $cart[$productId]['image'] = $product->image;
            $cart[$productId]['price'] = $product->price;
            $cart[$productId]['description'] = $product->description;
        }
        
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function remove(Request $request){
        $cart = session()->get('cart', []);
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function edit(Request $request)
    {
        $cart = session()->get('cart', []);
        $product_id = $request->input('product_id');
        $operation = $request->input('operation');

        if (isset($cart[$product_id])) {
            if ($operation === 'add') {
                $cart[$product_id]['quantity'] += 1;
            } else{
                $new_quantity = $cart[$product_id]['quantity'] - 1;
                if ($new_quantity < 1) {
                    unset($cart[$product_id]);
                } else {
                    $cart[$product_id]['quantity'] = $new_quantity;
                }
            }
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product quantity updated!');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
       $cart->delete();
    }
}
