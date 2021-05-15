<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_id',
        'doctor_category_id',
        'text',
        'type',
    ];
    /* -------------------------------------------------------------------------- */
    /*                               Models Relation start                        */
    /* -------------------------------------------------------------------------- */

    /* ----------------------- Doctor relation one to one ----------------------- */

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->role('doctor');
    }

    /* ----------------------- patient relation one to one ---------------------- */

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->role('patient');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctorCategory()
    {
        return $this->belongsTo(DoctorCategory::class, 'doctor_category_id');
    }

    public function userRole()
    {
        return $this->type;
    }
}
