<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'sku',
        'quantity',
        'price',
        'discount',
    ];

    public function gallery()
    {
        return $this->hasMany(GalleryProduct::class);
    }
}
