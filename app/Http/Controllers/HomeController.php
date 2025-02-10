<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category.SubCategory.sub_categories_images')->get();         
        return view('index', compact('products'));
        // return $products;
    }
}
