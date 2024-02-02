<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function userLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        // dd($request);
        $credentials = $request->credentials();
        // $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            dd("failed");
            return redirect()->to('/login')->withErrors(trans('auth.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
           if (Auth::check()) {
            // dd("passed");
    // Get the authenticated user's name
    $userName = Auth::user()->id;
    $userName = Auth::user()->name;
    $userEmail = Auth::user()->email;
    $userPhone = Auth::user()->phone;
    $userAddress = Auth::user()->address;
    $userPic = Auth::user()->p_pic;
    
    // dd($userPic);

    // Use $userName as needed, for example, display it in a view
    // return redirect()->to('/checkout', ['Name' => $name])->withSuccess(trans('auth.Passed'));
    return redirect()->to('/user_profile')->with(['Name' => $userName,'Email' => $userEmail,'Phone' => $userPhone,'Phone' => $userPhone,'Phone' => $userPhone, 'p_pic' => $userPic, 'success' => trans('auth.Passed')]);

    // return view('welcome', ['userName' => $userName]);
} else {
    // User is not authenticated, handle accordingly
}

        
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
