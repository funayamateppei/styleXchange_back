<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\ThreadImage;
use App\Models\ThreadComment;

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

    // threads:users 多:1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // threads:thread_images 1:多
    public function threadImages()
    {
        return $this->hasMany(ThreadImage::class);
    }

    // threads:thread_comments 1:多
    public function threadComments()
    {
        return $this->hasMany(ThreadComment::class);
    }

    // threads:users 多:多 いいね機能
    public function likedThreads()
    {
        return $this->belongsToMany(User::class, 'thread_likes', 'thread_id', 'user_id')
            ->withTimestamps();
    }

    // threads:users 多:多 ブックマーク機能
    public function bookmarkedThreads()
    {
        return $this->belongsToMany(User::class, 'thread_bookmarks', 'thread_id', 'user_id')
            ->withTimestamps();
    }
}
