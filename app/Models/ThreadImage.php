<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Thread;

class ThreadImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'path',
        'original_file_name',
    ];

    // thread_images:threads 多:1
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
