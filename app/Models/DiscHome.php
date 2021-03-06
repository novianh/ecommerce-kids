<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscHome extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'discount', 'title', 'icon'
    ];
}
