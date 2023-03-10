<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Item;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent',
    ];

    // categories:items 多:1
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
