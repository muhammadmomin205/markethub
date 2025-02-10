<?php

namespace App\Models;

use App\Models\store\shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;
    protected $table="orders";
    public $guarded=[];
    public function shop()
    {
        return $this->belongsTo(shop::class, 'shop_id');
    }
}
