<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingWishlist extends Model
{
    use HasFactory;
    protected $table="shopping_wishlist";
    public $guarded=[];
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class , 'sub_categories_id');
    }
}
