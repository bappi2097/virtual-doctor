<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'end',
        'start',
        'doctor_id',
        'patient_id',
        'description',
        'doctor_category_id',
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
