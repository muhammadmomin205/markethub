<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopingCart extends Model
{
    use HasFactory;
    protected $table='shoping_cart';
    public $guarded=[];
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_categories_id');
    }
}
