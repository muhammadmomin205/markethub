<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoesController extends Controller
{
    public function showAllProducts()
    {
        $shoes_products = Product::with('category.SubCategory.sub_categories_images')
            ->where('product_name', 'shoes')
            ->get();
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('shoes', compact('shoes_products', 'products'));
    }
}
