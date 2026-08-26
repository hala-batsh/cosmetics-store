<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery_companies_table';

    protected $fillable = [
        'name_company',
        'phone',
        'delivery_price',
        'estimated_time',
        'status'
    ];
}
