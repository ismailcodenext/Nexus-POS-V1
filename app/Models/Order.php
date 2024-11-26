<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'warehouse_id',
        'order_no',
        'user_id'
    ];
/**
     * Define a one-to-many relationship with OrderDetails.
     */
    public function details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    /**
     * Define a one-to-one relationship with OrderPaymentDetails.
     */
    public function payment()
    {
        return $this->hasOne(OrderPaymentDetails::class, 'order_id');
    }

}
