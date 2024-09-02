<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $table = 'purchases';

    protected $primaryKey = 'id';

    protected $guarded = [];
    
    protected $fillable = [
        'total_item',
        'total_price',
        'discount',
        'pay'
    ];

    public function supplier() {
        return $this->hasOne(Supplier::class, 'supplier_id',  'id');
    }
}
