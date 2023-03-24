<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Item;

class ItemComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'comment',
    ];

    // items_comments:users 多:1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // item_comments:items 多:1
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
