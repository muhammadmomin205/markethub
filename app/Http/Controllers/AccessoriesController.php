<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    public function showAllProducts()
    {
        $accessories_products = Product::with('category.SubCategory.sub_categories_images')
            ->where('product_name', 'accessories')
            ->get();
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('accessories', compact('accessories_products', 'products'));
    }
}
