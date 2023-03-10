<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Thread;
use App\Models\Category;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'user_id',
        'title',
        'text',
        'price',
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
}
