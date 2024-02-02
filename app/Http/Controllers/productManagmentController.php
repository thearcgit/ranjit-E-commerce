<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productManagmentController extends Controller
{
    public function addProductPage(){
        return view("admin/add_product");
    }
    public function addProduct(Request $request){
        try {
            $pAdd = new Product();
    
            $pAdd->p_name = $request->input('p_name');
            $pAdd->p_size = $request->input('p_size');
            $pAdd->p_quantity = $request->input('p_quantity');
            $pAdd->p_price = $request->input('p_price');
            $pAdd->p_discount = $request->input('p_discount');
            $pAdd->p_brand = $request->input('p_brand');
            $pAdd->p_color = $request->input('p_color');
            $pAdd->p_category = $request->input('p_category');
            $pAdd->p_discount = $request->input('p_discount');
            $pAdd->product_id = $request->input('product_id');
    
            // Handle file uploads
            if ($request->hasFile('p_image1')) {
                $uploadedFile1 = $request->file('p_image1');
                $path1 = $uploadedFile1->store('product_image', 'public');
                $pAdd->p_image1 = $path1;
            }
    
            if ($request->hasFile('p_image2')) {
                $uploadedFile2 = $request->file('p_image2');
                $path2 = $uploadedFile2->store('product_image', 'public');
                $pAdd->p_image2 = $path2;
            }

            if ($request->hasFile('p_image3')) {
                $uploadedFile2 = $request->file('p_image3');
                $path2 = $uploadedFile2->store('product_image', 'public');
                $pAdd->p_image3 = $path2;
            }

            if ($request->hasFile('p_image4')) {
                $uploadedFile2 = $request->file('p_image4');
                $path2 = $uploadedFile2->store('product_image', 'public');
                $pAdd->p_image4 = $path2;
            }
    
            // Repeat the process for p_image3 and p_image4
    
            // Save the product
            $pAdd->save();
    
            return redirect('dashboard')->with(['product_status' => 'Product added successfully', 'product' => $pAdd]);
        } catch (QueryException $e) {
            dd($e->getMessage()); // Log the exception message
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function ProductPage(){
        return view("admin/product_table");
    }

    public function ajaxAllProduct(){
        $products = Product::all(); // Fetch your data from the database

    return response()->json(['data' => $products]);
        
    }
    
}