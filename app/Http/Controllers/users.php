<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\product;
use App\Models\cart;
use App\Models\wishlist;

class users extends Controller
{

    public function welcome(){
       // dd(request()->ip());

        $home_product = product::all();
        return view("welcome", compact('home_product'));
    }
    
   
    
    public function productDetail($id){
        // Find the product id
        $productId = $id;
        
        // Find the specific product by product_id.
        $specific_product = Product::where('product_id', $productId)->first();
        
        // Check if the product is found
        if ($specific_product) {
            return view("product_detail", compact('specific_product'));
        } else {
            // Redirect or handle the case when the product is not found
            return redirect()->route('product.notfound'); // Adjust the route name or logic accordingly
        }
    }
    
    


    public function addToCart( Request $request){
        // dd($request);
        $Cart = new cart();
        $Cart->users_id = $request->users_id;
        $Cart->p_name = $request->product_name;
        // dd($Cart->p_name);
        $Cart->p_price = $request->product_price;
        $Cart->p_color = $request->product_color;
        $Cart->p_size = $request->product_size;
        $Cart->p_discount = $request->product_discount;
        $Cart->p_image1 = $request->product_image;

        if ($request->hasFile('p_image1')) {
            $addFile = $request->file('p_image1');
            $storageDisk = 'public';
            $path = Storage::disk($storageDisk)->putFile('Cart_image', $addFile);
            $Cart->p_image1 = $path;
        }
        
        $Cart->save();
        return redirect("checkout")->with('productFromCart', $Cart);

    }

    public function addToWish( Request $request){
        // dd($request);
        $Cart = new wishlist();
        $Cart->users_id = $request->users_id;
        $Cart->p_name = $request->product_name;
        // dd($Cart->p_name);
        $Cart->p_price = $request->product_price;
        $Cart->p_color = $request->product_color;
        $Cart->p_size = $request->product_size;
        $Cart->p_discount = $request->product_discount;
        $Cart->p_image1 = $request->product_image;

        if ($request->hasFile('p_image1')) {
            $addFile = $request->file('p_image1');
            $storageDisk = 'public';
            $path = Storage::disk($storageDisk)->putFile('Cart_image', $addFile);
            $Cart->p_image1 = $path;
        }
        $Cart->save();
        return redirect ("/");
    }
    
    
    public function userLogin(){
        return view("login");
    }
    
    public function totalProduct(){
        return view("all_product");
    }
    public function checkoutPage(Request $request)
{

    // dd($request);
    // Retrieve existing cart data from the cookie or create an empty array
    $emptyCart = json_decode($request->cookie('cart'), true) ?? [];

    // You can use $emptyCart to retrieve product details from your database
    // For demonstration purposes, let's assume you have a Product model
    $productsInCart = [];
    
    foreach ($emptyCart as $productId) {
        $product = Product::find($productId);

        if ($product) {
            // Assuming your Product model has properties like 'product_id', 'name', 'price', etc.
            $productsInCart[] = [
                'product_id' => $product->product_id,
                'name' => $product->p_name,
                'price' => $product->p_price,
                // Add other product details as needed
            ];
        }
    }

    return view('checkout', compact('productsInCart'));
}


    

    // ---------------------------------user login function------------
    public function profilePage(){
        return view("/user_profile");
    }
    public function editUserProfilePage(){
        return view("/edit_userprofile");
    }
    public function updateUserProfilePage(Request $request){
       
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric',
        'address' => 'required|string|max:255',
        'file' => 'mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        // Fetch the currently authenticated user
        $user = Auth::user();

        // Update the user attributes
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        // If a new file is uploaded, update the profile picture
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            
            // Define the storage disk ('public' or 'storage')
            $storageDisk = 'public';
    
            // Store the file in the specified disk and directory
            // $path = $request->file('profile_picture')->store('profile_pictures', 'app');
            // $path = $request->file('profile_picture')->store('profile_pictures', 'public');

            $path = $uploadedFile->store('profile_pictures', $storageDisk);
            // $path = $uploadedFile->store("{$storageDisk}/profile_pictures");
    
            // Update the user's profile picture column in the database with the file path
            $user->p_pic = $path;
        }

        // Save the updated user
        $user->save();

        return redirect('/user_profile')->with(['status', 'Profile updated successfully','user' => $user]);
    } catch (QueryException $e) {
        dd($e->getMessage()); // Log the exception message
        return redirect()->back()->with('error', 'Something went wrong');
    }
}
    
    // .------------------------------
}

        
