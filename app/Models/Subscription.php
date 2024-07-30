<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // Properties
    use HasFactory;

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'ends_at' => 'date:d-m-Y',
    ];
}
