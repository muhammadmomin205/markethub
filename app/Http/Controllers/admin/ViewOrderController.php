<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class ViewOrderController extends Controller
{
    public function showOrders(){
        $orders=order::with('shop')->get();
        return view('admin.viewOrders' , compact('orders'));
        // return $orders;
    }

}
