<?php

namespace App\Http\Controllers\store;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ViewProductController extends Controller
{
    public function showProducts(){
        $sub_categories = SubCategory::with(['products', 'category'])
        ->where('shop_id' , Auth::user()->shop_id)
        ->get();
        return view('store.viewProducts' , compact('sub_categories'));
    }
}
