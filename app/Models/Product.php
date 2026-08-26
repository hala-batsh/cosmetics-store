<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'description',
        'price',
        'discount_price',
        'stock',
        'sku',
        'status'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
    public function ratingsCount()
    {
        return $this->reviews()->count();
    }
}
