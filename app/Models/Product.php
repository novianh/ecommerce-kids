<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'desc',
        'sku',
        'quantity',
        'price',
        'discount',
        'status',
        'id_category',
        'id_entity',
        'img_thumbnail'
    ];

    public function gallery()
    {
        return $this->hasMany(GalleryProduct::class);
    }
    public function item()
    {
        return $this->hasMany("App\Models\OrderItem", "product_id");
    }
    public function newGallery()
    {
        return $this->hasMany(GalleryProduct::class)->latest()->first();
    }
    public function entity()
    {
        return $this->hasMany(Entity::class);
    }

    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 0) {
            return '<span class="badge bg-secondary">Draft</span>';
        }
        return '<span class="badge bg-success">Active</span>';
    }

    public function category()
    {
        return $this->belongsTo("App\Models\ProductCategory", "id_category")->withTrashed();
    }
}
