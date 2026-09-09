<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'cat_submission_id',
        'gender',
        'age',
        'description',
        'is_available_for_adoption',
        'admin_id',
        'owner_name',
        'owner_contact',
        'google_maps_link',
        'breed_id',
        'address_id',
    ];

    protected $casts = [
        'is_available_for_adoption' => 'boolean',
    ];

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function admin()
    {
        return $this->belongsTo(\App\Models\User::class, 'admin_id');
    }

    public function adoption()
    {
        return $this->hasOne(Adoption::class);
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function images()
    {
        return $this->morphMany(CatImage::class, 'imageable');
    }
}
