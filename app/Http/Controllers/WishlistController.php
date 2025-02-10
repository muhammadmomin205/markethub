<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ShoppingWishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addingProductWishlist(string $id)
    {
        if (Auth::check()) {
            if (ShoppingWishlist::where('sub_categories_id', $id)
            ->where('user_id', Auth::id())
            ->exists()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'This product is already in your wishlist'
                ]);
            } else {
                $shopping_wishlist = new ShoppingWishlist();
                $shopping_wishlist->sub_categories_id = $id;
                $shopping_wishlist->user_id = Auth::user()->id;
                $shopping_wishlist->save();

                $wishlistCount = ShoppingWishlist::where('user_id', Auth::user()->id)->count();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Product added to wishlist successfully',
                    'wishlist_count' => $wishlistCount
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'You need to be logged in to add products in wishlist.'
            ]);
        }
    }

    public function showProducts()
    {
        $wishlist_items = ShoppingWishlist::with('sub_category.Sub_categories_images')
            ->where('user_id', Auth::id())
            ->get();
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('wishlist', compact('wishlist_items', 'products'));
        // return $wishlist_items;
    }
    public function deletingProductWishlist(string $id)
    {
        $wishlist_item = ShoppingWishlist::where('id', $id)
        ->where('user_id', Auth::id())
        ->first();
        $wishlist_item->delete();
        return response()->json(['message' => 'Product deleted from wishlist successfully']);
    }
}
