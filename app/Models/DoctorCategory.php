<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class DoctorCategory extends Model
{
    use HasFactory, SoftDeletes, HasSlug;
    /**
     * 
     * fillable column
     */

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'isActive',
    ];

    /**
     * 
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function doctors()
    {
        return $this->hasMany(User::class)->role('doctor');
    }
}
