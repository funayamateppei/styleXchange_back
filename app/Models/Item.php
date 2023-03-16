<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Thread;
use App\Models\Category;
use App\Models\ItemImage;
use App\Models\ItemComment;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'user_id',
        'title',
        'text',
        'price',
        'gender',
        'category_id',
        'color',
        'size',
        'condition',
        'days',
        'sale',
        'postage',
    ];

    // items:users 多:1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // items:threads 多:1
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    // items:categories 1:多
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // items:item_images 1:多
    public function itemImages()
    {
        return $this->hasMany(ItemImage::class);
    }

    // items:item_comments 1:多
    public function itemComments()
    {
        return $this->hasMany(ItemComment::class);
    }

    // items:users 多:多 いいね機能
    public function likedItems()
    {
        return $this->belongsToMany(User::class, 'item_likes', 'item_id', 'user_id')
        ->withTimestamps();
    }

    // items:users 多:多 いいね機能
    public function purchasedItems()
    {
        return $this->belongsToMany(User::class, 'purchasers', 'item_id', 'user_id')
        ->withTimestamps();
    }
}
