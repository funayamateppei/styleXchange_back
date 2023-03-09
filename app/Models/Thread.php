<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\ThreadImage;

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
}
