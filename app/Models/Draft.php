<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_no',
        'customer_name',
        'date',
        'sub_total',
        'tax',
        'discount',
        'shipping_cost',
        'totalamount',
        'user_id'
    ];

   

}
