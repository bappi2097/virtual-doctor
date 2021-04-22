<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'doctor_category_id',
        'description',
        'day',
        'start',
        'end',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->role('doctor');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->role('patient');
    }

    public function doctorCategory()
    {
        return $this->belongsTo(DoctorCategory::class, 'doctor_category_id');
    }
}
