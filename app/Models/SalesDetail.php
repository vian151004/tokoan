<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $table = 'sales_detail';

    protected $primaryKey = 'id';

    protected $guarded = [];

    function sales()
    {
        return $this->belongsTo(SalesDetail::class, 'sales_id', 'id');  
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
