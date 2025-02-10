<?php

namespace App\Http\Controllers\admin;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewProductController extends Controller
{
    public function showSubCategory(){
        $sub_categories=SubCategory::with('shop')->get();
        return view('admin.viewProducts' , compact('sub_categories'));      
    }
    public function deletingProduct(string $id){
        $sub_categories=SubCategory::find($id);
        $sub_categories->delete();
        return redirect()->back()->with('success', 'Product has been added successfully!');
    }
}
