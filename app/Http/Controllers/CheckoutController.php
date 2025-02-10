<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function storeCheckout(Request $request)
    {
        // Get cart items from the request
        $cartItems = $request->input('cartItems');

        // Prepare the checkout data without inserting into the database
        $checkoutItems = [];

        foreach ($cartItems as $item) {
            $subCategory = SubCategory::find($item['id']);
            $checkoutItems[] = [
                'sub_categories_id' => $subCategory->id,
                'shop_id'=>$subCategory->shop_id,
                'product_title' => $subCategory->product_title,
                'product_quantity' => $item['quantity'],
                'product_price' => $subCategory->price,
                'total_price' => $item['quantity'] * $subCategory->price,
            ];
        }
        // Store checkout data in session
        session()->put('checkoutItems', $checkoutItems);

        // Return response to indicate success
        return response()->json(['status' => 'success']);
    }

    public function showOrderSummary()
    {
        $checkoutItems = session('checkoutItems');
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('checkout', compact('checkoutItems' , 'products'));
    }
}
