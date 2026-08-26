<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'delivery_companies_table_id',
        'payment_method_id',
        'payment_status',
        'order_status',
        'processing',
        'delivery_price',
        'subtotal',
        'total_price',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot('quantity', 'price_at_order');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function address()
    {
        return $this->belongsTo(Address::class);
    }

  
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
