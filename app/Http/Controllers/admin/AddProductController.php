<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function showProducts()
    {
        $products = Product::all();
        return view('admin.addProduct', compact('products'));
    }
    public function addProducts(Request $req)
    {
        $products = new Product();
        $products->product_name = $req->product;
        $products->save();
        return redirect()->back()->with('success', 'Product has been added successfully!');
    }
    public function addCategory(Request $req)
    {
        $category = new Category();
        $category->categories_name = $req->category;
        $category->product_id = $req->product_id;
        $category->save();
        return redirect()->back()->with('success', 'Category has been added successfully!');
    }
}
