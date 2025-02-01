<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;

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
        $users = User::all();
        return view("dashboard.user", compact('users'));
    }
    public function createUsers(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:5',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg,webp,ico,svg,jiff|max:2048',
            'phone' => 'required|min:9',
            'address' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'dob' => 'required|date|before_or_equal:today'
        ]);
        
        if( $validated['gender'] == '1')
            $validated['gender'] = 'male';
        else    
           $validated['gender'] = 'female';
        
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('profile_images', 'public');
        }

        // Create a new user
        User::create($validated);    
        return redirect()->route('dashboard.users')->with('User created successfully!');

    }
    public function addUser()
    {
        return view("user.addUser");
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
