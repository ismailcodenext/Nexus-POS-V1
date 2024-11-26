<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPaymentDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'order_details_id',
        'shipping_cost',
        'discount_amount',
        'paid_amount',
        'due_amount',
        'sub_total',
        'totalamount',
        'user_id'
    ];

 /**
     * Define an inverse one-to-one relationship with Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Define an inverse one-to-one or one-to-many relationship with OrderDetails.
     */
    public function orderDetails()
    {
        return $this->belongsTo(OrderDetails::class, 'order_details_id');
    }

}

