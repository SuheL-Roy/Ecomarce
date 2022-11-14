<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded= [];
    public function main_category_info(){
        return $this->belongsTo(MainCategory::class,'main_category_id');
    }

    public function related_sub_category(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function related_product(){
        return $this->belongsToMany(Product::class);
    }
}

