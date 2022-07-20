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
        'status',
        'transaction_number'
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
    public function item()
    {
        return $this->hasMany("App\Models\OrderItem", "order_id")->withTrashed();
    }
    public function transfer()
    {
        return $this->hasOne(Transfer::class);
    }

    // acessor status
    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 1) {
            return '<span class="badge bg-primary">waiting response</span>';
        }
        if ($this->status == 6) {
            return '<span class="badge bg-dark">Order finished</span>';
        }
        if ($this->status == 7) {
            return '<span class="badge bg-danger">Waiting Cancel</span>';
        }
        if ($this->status == 8) {
            return '<span class="badge bg-light">Canceled</span>';
        }
        if ($this->status == 3) {
            return '<span class="badge bg-warning">On Process</span>';
        }
        if ($this->status == 4) {
            return '<span class="badge bg-info">Sent</span>';
        }
        if ($this->status == 5) {
            return '<span class="badge bg-success">Received</span>';
        }
        return '<span class="badge bg-secondary">Pending payment</span>';
    }
    public function getStatusFrontAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 1) {
            return '<span class="">Waiting response from seller</span>';
        }
        if ($this->status == 6) {
            return '<span class="">Order finished</span>';
        }
        if ($this->status == 7) {
            return '<span class="">Waiting response for cancel order</span>';
        }
        if ($this->status == 8) {
            return '<span class="">Order Canceled</span>';
        }
        if ($this->status == 3) {
            return '<span class="">Your order is being processed</span>';
        }
        if ($this->status == 4) {
            return '<span class="">Order sent</span>';
        }
        if ($this->status == 5) {
            return '<span class="">Order received by customer</span>';
        }
        return '<span class="">Waiting payment</span>';
    }
}
