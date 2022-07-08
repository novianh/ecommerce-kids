<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'name',
    ];

    public function order()
    {
        return $this->hasMany("App\Models\OrderDetail", "courier_id");
    }
}
