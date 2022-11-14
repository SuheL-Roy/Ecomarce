<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    protected $guarded= [];
    public function related_categories_id_and_name()
    {
        return $this->hasMany(Category::class,'main_category_id')->select('name','id');
    }
    
   public function related_categories(){
    return $this->hasMany(Category::class,'main_category_id')->with('related_sub_category')->withCount('related_product');
   }

   public function related_product(){
    return $this->belongsToMany(Product::class);
}

// public function related_products_according_to_size()
// {
//     return $this->belongsToMany(Product::class)->with('filter_by_size');
// }

}
