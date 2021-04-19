<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorCategory extends Model
{
    use HasFactory, SoftDeletes;
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

    public function doctors()
    {
        return $this->hasMany(User::class)->role('doctor');
    }
}
