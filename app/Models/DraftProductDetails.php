<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftProductDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'draft_id',
        'quantity',
        'price',
        'user_id'
    ];


    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }



    public function drafts()
    {
        return $this->belongsTo(Draft::class, 'draft_id');
    }
}
