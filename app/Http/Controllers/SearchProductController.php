<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function searchProduct(Request $req)
    {

        // Validate the search input
        $req->validate(
            [
                'search-product-item' => 'required|regex:/^(\S+\s+?){0,4}\S+$/', // Validation rule
            ],
            [
                'search-product-item.required' => 'The search field is required.',
                'search-product-item.regex' => 'The search field must contain at least 5 words.',
            ]
        );
        
        $searchValue = $req->input('search-product-item');
        $searchProduct = $req->input('search-product-item');
        $searchProduct =  $searchProduct . '%';

        // Query for products
        $products = Product::with(['category.SubCategory.Sub_categories_images'])
            ->where('product_name', 'LIKE', $searchProduct)
            ->get();
        // Query for categories
        $categories = Category::with(['SubCategory.Sub_categories_images'])
            ->where('categories_name', 'LIKE', $searchProduct)
            ->get();
        // Query for sub_categories
        $sub_categories = SubCategory::with('Sub_categories_images')
            ->where('product_title', 'LIKE', $searchProduct)
            ->get();
        // Merge results
        $search_results = $products->merge($categories)->merge($sub_categories);

        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('SearchProduct', compact('search_results', 'searchValue', 'products'));
        // return $search_results;
    }
}
