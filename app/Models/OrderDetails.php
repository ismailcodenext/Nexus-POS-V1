<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'user_id'
    ];

    /**
     * Define an inverse one-to-many relationship with Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Define a one-to-one or one-to-many relationship with OrderPaymentDetails.
     */
    public function paymentDetails()
    {
        return $this->hasOne(OrderPaymentDetails::class, 'order_details_id');
    }
}
