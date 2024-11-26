<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchases_id',
        'referance_no',
        'date',
        'subtotal',
        'discount',
        'grand_subtotal',
        'paid',
        'due',
        'payment_method',
        'status',
        'attach_document',
        'supplier_id',
        'wareshop_id',
        'user_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supriler::class, 'supplier_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'wareshop_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchase_product_details', 'purchase_id', 'product_id');
    }

}
