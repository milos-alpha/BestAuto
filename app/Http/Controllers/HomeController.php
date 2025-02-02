<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\View\Components\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("home.index", compact('products'));
    }

    public function products ()
    {
        $products = Product::all();
        return view ("home.products", compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
        ->orWhere('description', 'like', "%$query%")
        ->get();

        return view('home.products', compact('products', 'query'));
    }
}
