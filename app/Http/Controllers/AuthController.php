<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Attempt to find the user
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);

            if($user->role_id == 1){
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('home.index');
            // Return the authenticated user info or a redirect 
        } else {
            return redirect()->back()->with('login_error', 'Incorrent email or password');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('home.index');
    }
}
