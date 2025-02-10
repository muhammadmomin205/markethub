<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WomenController extends Controller
{
    public function showAllProducts()
    {
        $women_products = Product::with('category.SubCategory.sub_categories_images')
            ->where('product_name', 'women')
            ->get();
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('women', compact('women_products' , 'products'));
    }
}
