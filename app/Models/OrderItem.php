<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function courier()
    {
        return $this->belongsTo("App\Models\OrderDetail", "order_id")->withTrashed();
    }
    public function product()
    {
        return $this->belongsTo("App\Models\OrderDetail", "product_id")->withTrashed();
    }

    
}
