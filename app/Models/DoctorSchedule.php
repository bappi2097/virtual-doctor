<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'day',
        'start',
        'end',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class)->role('doctor');
    }
}
