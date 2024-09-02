<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $table = 'purchase_details';  

    protected $fillable = [  
        'purchase_id',   
        'product_id',   
        'purchase_price',
        'total',
        'subtotal'
    ];

    public function product() {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }

    public function purchase() {
        return $this->hasOne(Purchase::class, 'purchase_id', 'id');
    }
}
