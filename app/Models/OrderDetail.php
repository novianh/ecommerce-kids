<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'total',
        'cst_id',
        'note',
        'payment_id',
        'address_id',
        'courier_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "cst_id")->withTrashed();
    }
    public function address()
    {
        return $this->belongsTo("App\Models\CustomerAddress", "address_id")->withTrashed();
    }
    public function payment()
    {
        return $this->belongsTo("App\Models\Payment", "payment_id")->withTrashed();
    }
    public function courier()
    {
        return $this->belongsTo("App\Models\Courier", "courier_id")->withTrashed();
    }
}
