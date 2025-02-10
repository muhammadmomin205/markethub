<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function showAllProducts(String $id)
    {
        $categories = Category::whereHas('subCategory', function ($query) use ($id) {
            $query->where('categories_id', $id);
        })
        ->with(['subCategory' => function ($query) use ($id) {
            $query->where('categories_id', $id)
                ->with('Sub_categories_images'); // Eager load the image relation
        }])
        ->get();
        
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
    
        return view('subCategories', compact('categories' , 'products' ));
        // return $categories;
    }
    
}
