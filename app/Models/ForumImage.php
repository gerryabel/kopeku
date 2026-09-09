<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumImage extends Model
{
    protected $fillable = ['forum_id', 'image_path'];

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}
