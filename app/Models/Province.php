<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'indonesia_provinces';
    protected  $primaryKey = 'code';

    public function city()
    {
        return $this->hasMany('App\Models\City', 'province_code');
    }
}
