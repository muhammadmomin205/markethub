<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\store\market;
use App\Models\store\shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function addShops()
    {
        $markets = market::all();
        return view('admin.addShops', compact('markets'));
    }
    public function addShopData(Request $req)
    {
        $shop = new Shop();
        $shop->market_id = $req->market_id;
        $shop->shop_name = $req->shop;
        $shop->owner_fname = $req->first_name;
        $shop->owner_lname = $req->last_name;
        $shop->email = $req->email;
        $shop->phone = $req->phone;
        $shop->shop_address = $req->address;
        $shop->save();
        return redirect()->back()->with('success', 'Shop has been added successfully!');
    }
    public function viewShops(){
        $shops=shop::all();
        return view('admin.viewShops', compact('shops'));
    }
}
