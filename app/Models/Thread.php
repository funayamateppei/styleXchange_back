<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $attribute = [
        'archive' => true,
    ];

    protected $fillable = [
        'user_id',
        'text',
        'archive',
    ];
}
