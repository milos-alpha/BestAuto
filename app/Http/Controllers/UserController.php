<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view("user.auth.login");
    }
    public function create(){
        return view('user.auth.register');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:5',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg,webp,ico,svg,jiff|max:2048',
            'phone' => 'required|min:9',
            'address' => 'required',
            'gender' => 'required',
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
        
        return redirect()->route('user.login')->with('registration_success', 'User created successfully!');
    }

    public function show(){
        return view('user.auth.login');
    }
}
