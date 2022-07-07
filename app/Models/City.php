<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'indonesia_cities';

    public function city()
    {
        return $this->belongsTo('App\Models\Province', 'code');
    }
}
