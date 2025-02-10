<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Sub_categories_images extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function SubCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
