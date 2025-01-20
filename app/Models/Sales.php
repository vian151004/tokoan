<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $primaryKey = 'id';

    protected $guarded = [];

    function salesDetail()
    {
        return $this->hasMany(SalesDetail::class, 'sales_id', 'id');  
    }

    function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');  
    }
}
