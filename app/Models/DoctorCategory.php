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
        'image',
        'description',
        'isActive',
    ];

    public function doctors()
    {
        return $this->belongsToMany(User::class)->role('doctor');
    }
}
