<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Product;

class Category extends Model
{ 
    use HasFactory;
    protected $table="categories";
    public $guarded=[];
    public $timestamps = false;

    public function SubCategory(){
        return $this->hasMany(SubCategory::class , 'categories_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
