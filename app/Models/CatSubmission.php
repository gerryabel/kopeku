<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'age',
        'gender',
        'description',
        'status',
        'is_available_for_adoption',
        'owner_name',
        'owner_contact',
        'google_maps_link',
        'breed_id',
        'address_id',
    ];

    public function images()
    {
        return $this->morphMany(\App\Models\CatImage::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
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
