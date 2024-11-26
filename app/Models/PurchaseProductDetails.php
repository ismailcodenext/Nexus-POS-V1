<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProductDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'purchase_id',
        'user_id',
    ];


    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function purchase()
    {
        return $this->belongsTo(Purchases::class, 'purchase_id');
    }

}