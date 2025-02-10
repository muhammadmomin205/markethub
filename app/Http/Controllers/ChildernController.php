<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ChildernController extends Controller
{
    public function showAllProducts()
    {
        $childern_products = Product::with('category.SubCategory.sub_categories_images')
            ->where('product_name', 'childern')
            ->get();
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('childern', compact('childern_products', 'products'));
    }
}
