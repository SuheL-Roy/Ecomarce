<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['discount'];

    public function getDiscountAttribute()
    {
        $today_date = Carbon::now()->format('Y-m-d');
        if($this->expiration_date > $today_date){
            $discount = $this->price - ( $this->price * ( $this->discount_price / 100 ));
          //  dd($this->discount_price);
          return $this->attributes['discount'] = ceil($discount);
        }else{
            return 0;
        }
    }
   

    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'serial');
    }
    public function brand_info()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function creator_info()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsToMany(SubCategory::class);
    }

    public function Main_category()
    {
        return $this->belongsToMany(MainCategory::class);
    }

    public function color()
    {
        return $this->belongsToMany(color::class);
    }
    public function image()
    {
        return $this->belongsToMany(Image::class);
    }
    public function Publication()
    {
        return $this->belongsToMany(Publication::class);
    }

    public function Size()
    {
        return $this->belongsToMany(Size::class);
    }

    public function Unit()
    {
        return $this->belongsToMany(Unit::class);
    }

    public function Vendor()
    {
        return $this->belongsToMany(Vendor::class);
    }

    public function Writer()
    {
        return $this->belongsToMany(Writer::class);
    }
}
