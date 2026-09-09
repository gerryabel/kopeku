<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($forum) {
            $forum->comments()->delete();
        });
    }

    public function images()
    {
        return $this->hasMany(ForumImage::class);
    }
}
