<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transfer',
        'order_detail_id'
    ];

    public function order()
    {
    	return $this->belongsTo(OrderDetail::class)->withTrashed();
    }
}
