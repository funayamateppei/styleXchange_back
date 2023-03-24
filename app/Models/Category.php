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
        'gender', // 0 man, 1 woman, 2 free
        'big_category',
        'sort_number',
    ];

    // categories:items 多:1
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
