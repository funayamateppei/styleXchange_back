<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Thread;
use App\Models\ThreadComment;
use App\Models\Item;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'icon_path',
        'post_code',
        'address',
        'height',
        'google_id',
        'line_id',
        'instagram_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // users:threads 1:多
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    // users:items 1:多
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    // users:thread_comments 1:多
    public function threadComments()
    {
        return $this->hasMany(ThreadComment::class);
    }

    // users:threads 多:多 いいね機能
    public function likedThreadBy()
    {
        return $this->belongsToMany(Thread::class, 'thread_likes', 'user_id', 'thread_id')
            ->withTimestamps();
    }

    // users:threads 多:多 ブックマーク機能
    public function bookmarkedBy()
    {
        return $this->belongsToMany(Thread::class, 'thread_bookmarks', 'user_id', 'thread_id')
            ->withTimestamps();
    }

    // users:items 多:多 いいね機能
    public function likedItemBy()
    {
        return $this->belongsToMany(Item::class, 'item_likes', 'user_id', 'item_id')
            ->withTimestamps();
    }

    // users:items 多:多 購入履歴機能
    public function purchasedItemBy()
    {
        return $this->belongsToMany(Item::class, 'purchasers', 'user_id', 'item_id')
            ->withTimestamps();
    }

    // users:users 多：多 フォロー機能
    public function followings()
    {
        return $this->belongsToMany(self::class, "follows", "user_id", "following_id")
            ->withTimestamps();
    }
    public function followers()
    {
        return $this->belongsToMany(self::class, "follows", "following_id", "user_id")
            ->withTimestamps();
    }
}
