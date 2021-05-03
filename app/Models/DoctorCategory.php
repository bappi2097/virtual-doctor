<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorCategory extends Model
{
    use HasFactory, HasSlug;
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


    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_category_id');
    }

    public function doctorsData()
    {
        return $this->doctors()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        })->all();
    }
}
