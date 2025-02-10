<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub_categories_images;
use App\Models\Category;
use App\Models\store\shop;

class SubCategory extends Model
{
    use HasFactory;
    protected $table="sub_categories";
    public $timestamps = false;
    public $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class , 'categories_id'); 
    }
    public function products()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
    public function sizes()
    {
        return $this->belongsTo(Sub_categories_sizes::class  , 'sizes_id'); 
    }
    public function shop()
    {
        return $this->belongsTo(shop::class, 'shop_id');
    }
    public function Sub_categories_images(){
        return $this->hasOne(Sub_categories_images::class , 'sub_categories_id');
    }
    public function shopping_cart(){
        return $this->hasMany(ShopingCart::class);
    }
    public function shopping_wishlist(){
        return $this->hasMany(ShoppingWishlist::class);
    }
}
