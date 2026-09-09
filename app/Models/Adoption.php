<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'applicant_id',
        'status',
        'message',
    ];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function images()
    {
        return $this->morphMany(CatImage::class, 'imageable');
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
