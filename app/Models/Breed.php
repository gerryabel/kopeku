<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['name'];

    public function cats()
    {
        return $this->hasMany(Cat::class);
    }
}
