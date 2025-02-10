<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Sub_categories_sizes extends Model
{
    use HasFactory;
    use HasFactory;
    use HasFactory;
    protected $table="sub_categories_sizes";
    public $guarded=[];
    public function SubCategory(){
        return $this->hasMany(SubCategory::class);
    }
}
