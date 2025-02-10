<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function showProductDetails(string $id)
    {
        $productDetails = SubCategory::with('shop', 'sub_categories_images' , 'sizes')->find($id);
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('productDetails', compact('productDetails' , 'products'));
        // return $productDetails;
    }
}
