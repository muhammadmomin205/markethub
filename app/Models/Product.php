<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    public $timestamps = false;
    public $guarded=[];
    public function category(){
        return $this->hasMany(category::class);
    }
    public function sub_category(){
        return $this->hasMany(SubCategory::class , 'product_id');
    }
}
