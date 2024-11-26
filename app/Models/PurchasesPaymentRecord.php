<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesPaymentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'referance_no',
        'transaction_id',
        'payment_method',
        'date',
        'purchase_id',
        'user_id'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchases::class, 'purchase_id');
    }

}
