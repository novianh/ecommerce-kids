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
        'id_entity'
    ];

    public function gallery()
    {
        return $this->hasMany(GalleryProduct::class);
    }

    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 0) {
            return '<span class="badge bg-gradient-secondary">Draft</span>';
        }
        return '<span class="badge bg-gradient-success">Aktif</span>';
    }

    public function category()
    {
        return $this->belongsTo("App\Models\ProductCategory", "id_category")->withTrashed();
    }
}
