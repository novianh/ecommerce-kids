<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WwdHome extends Model
{
    use HasFactory;
    protected $fillable = [
        'title1', 'title2', 'desc1', 'desc2', 'image1', 'image2'
    ];
}
