<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function userSignup(){
        return view("signup");
    }
    public function signup(Request $request)
    {
        // dd ($request);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|string|confirmed', // Ensure password confirmation
        ]);
    
        try {
            // Create a new User instance
            $user = new User();
    
            // Assign values from the validated data to the user instance
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->password = bcrypt($request->input('password'));
    
            // Save the user
            $user->save();
    
            return redirect('/login')->with('status', 'User registered successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
    
            // Check if it's a duplicate entry error (error code 1062 for unique constraint)
            if ($errorCode == 1062) {
                // Duplicate entry error
                return redirect()->back()->with('error', 'The provided email is already registered. Please use a different email.');
            }
    
            // Handle other types of errors if needed
            return redirect()->back()->with('password', 'An error occurred during user registration. Please try again later.');
        }
    }
    
}
