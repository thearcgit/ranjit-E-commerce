<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view("login");
    }


// app/Http/Controllers/AuthController.php





    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('/dashboard'); // Redirect to the dashboard or any other authenticated route
        } else {
            // Authentication failed
            return redirect('/login')->with('error', 'Invalid phone number or password');
        }
    }

    public function signout()
{
    Auth::logout();

    // If you want to redirect to a specific page after signing out
    return redirect('/login')->with('signout', 'You have been signed out successfully');
}

}
