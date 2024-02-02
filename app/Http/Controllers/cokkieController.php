<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\product;
class cokkieController extends Controller
{
    public function storeDataInCookie(Request $request, $productId)
    {
        // Retrieve product details based on $productId
        $product = Product::where('product_id', $productId)->first();

        if ($product) {
            // Retrieve existing cart data from the cookie or create an empty array
            $cart = json_decode($request->cookie('cart'), true) ?? [];
          
            // Add the current product to the cart
            $cart[] = [
                'product_id' => $product->product_id,
                'name' => $product->p_name,
                'price' => $product->p_price,
                'price' => $product->p_price,
                // Add other product details as needed
            ];
            // dd($cart);

            // Store the updated cart data in the cookie
            return redirect("/checkout")->withCookie(cookie('cart', json_encode($cart), 60));

            // If you want to add a success message, you can use with() method
            // return redirect("/checkout")->withCookie(cookie('cart', json_encode($cart), 60))->with('success', 'Product added to cart');
        }

        // Redirect with an error message if the product is not found
        return redirect("/products")->with('error', 'Product not found');
    }



    public function checkoutPage(Request $request)
    {
        // Retrieve the serialized data from the cookie
        $formDataSerialized = $request->cookie('formData');
    
        // Unserialize the data to get the original array
        $formData = unserialize($formDataSerialized);
    
        // Other logic...
    
        return view('checkout', compact('formData'));
    }
    public function clearFormDataCookie()
    {
        // Set a new cookie with the same name and an expiration time in the past
        $minutes = -1; // This will make the cookie expire immediately
        Cookie::queue('formData', null, $minutes);
    
        // Redirect or return a response as needed
        return redirect("/some-page");
    }    
    
    
}
