<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return view('dashboard.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function users()
    {
        return view("dashboard.user");
    }
    public function orders()
    {
        return view("dashboard.order");
    }
    public function categories()
    {
        return view("dashboard.categories");
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
