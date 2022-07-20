<?php

namespace App\Models;

use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class InTouch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'message'
    ];

    // public static function boot()
    // {

    //     parent::boot();

    //     static::created(function ($item) {
    //         $adminEmail = 'noviponorogo3@gmail.com';
    //         Mail::to($adminEmail)->send(new ContactMail($item));
    //     });
    // }
}
