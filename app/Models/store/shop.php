<?php

namespace App\Models\store;

use App\Models\order;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shop extends Model
{
    use HasFactory;
    protected $table = "shops";
    public $guarded = [];

    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class, 'shop_id');
    }
    public function orders(){
        return $this->hasMany(order::class , 'shop_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            do {
                $model->reg_num = rand(10000, 99999);
            } while (self::where('reg_num', $model->reg_num)->exists());
        });
    }
}
