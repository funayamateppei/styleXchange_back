<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Thread;

class ThreadComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'thread_id',
        'comment',
    ];

    // thread_comments:users 多:1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // thread_comments:threads 多:1
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
