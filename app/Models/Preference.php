<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = ['me_notify', 'image_background_chat'];

    protected $casts = [
        'me_notify' => 'boolean'
    ];
}
