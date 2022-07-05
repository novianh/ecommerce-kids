<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cst_id',
        'name',
        'address',
        'address2',
        'country',
        'state',
        'zip',
        'telephone',
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "cst_id")->withTrashed();
    }
}
