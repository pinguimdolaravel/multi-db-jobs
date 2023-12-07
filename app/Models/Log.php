<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $connection = 'jeremias';

    protected $guarded = [];

    protected $casts = [
        'metadata' => 'array',
    ];
}
