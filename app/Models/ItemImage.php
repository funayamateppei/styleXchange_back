<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Item;

class ItemImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'path',
        'original_file_name',
    ];

    // item_images:items 多:1
    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}
