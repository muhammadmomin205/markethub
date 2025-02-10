<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopingCart;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopingCartController extends Controller
{
    public function addingProductCart(string $id)
    {
        if (Auth::check()) {
            if (ShopingCart::where('sub_categories_id', $id)->where('user_id', Auth::id())->exists()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'This product is already in your cart'
                ]);
            } else {
                $shoping_cart = new ShopingCart();
                $shoping_cart->sub_categories_id = $id;
                $shoping_cart->user_id = Auth::user()->id;
                $shoping_cart->save();
                $cartCount = 0;
                $cartCount = ShopingCart::where('user_id', Auth::user()->id)->count();


                return response()->json([
                    'status' => 'success',
                    'message' => 'Product added to cart successfully',
                    'cart_count' => $cartCount
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'You need to be logged in to add products in cart.'
            ]);
        }
    }

    public function showProducts()
    {
        $cart_items = ShopingCart::with('sub_category.Sub_categories_images')
            ->where('user_id', Auth::id())
            ->get();
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('shopingCart', compact('cart_items', 'products'));
        // return $cart_items;
    }

    public function deletingProductCart(string $id)
    {
        $cart_item = ShopingCart::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        $cart_item->delete();
        return response()->json(['message' => 'Product deleted from cart successfully']);
    }
}
