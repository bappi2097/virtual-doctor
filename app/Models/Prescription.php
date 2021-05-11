<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Prescription Model
 */

class Prescription extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'description',
    ];

    /**
     * patient
     *
     * @return User $patient
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id')->role('patient');
    }

    /**
     * doctor
     *
     * @return User $doctor
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id')->role('doctor');
    }
}
