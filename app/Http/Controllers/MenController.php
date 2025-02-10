<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MenController extends Controller
{
    public function showAllProducts()
    {
        $men_products = Product::with('category.SubCategory.sub_categories_images')
            ->where('product_name', 'men')
            ->get();
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('men', compact('men_products', 'products'));
        // return $men_products;
    }
}
