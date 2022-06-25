<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
    ];

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id');
    }
}
