<?php

namespace App\Models;

use Carbon\Doctrine\DateTimeType;
use DateTime;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use IntlTimeZone;

class Appointment extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'day',
        'end',
        'start',
        'status',
        'doctor_id',
        'patient_id',
        'description',
        'notification',
        'prescription_id',
        'doctor_category_id',
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

    public function doctorCategory()
    {
        return $this->belongsTo(DoctorCategory::class, 'doctor_category_id');
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    /* -------------------------------------------------------------------------- */
    /*                             Models Relation End                            */
    /* -------------------------------------------------------------------------- */

    /**
     * statusClass return appointment status 
     * bootstrap 5 color class
     *
     * @return string
     */
    public function statusClass(): string
    {
        return appointmentStatusClass($this->status);
    }

    /**
     * status
     *
     * @return bool
     */
    public function status(): bool
    {
        return $this->status == 'accepted';
    }

    /**
     * This method return true if
     * status is accepted and schedule
     * is current time
     *
     * @return bool
     */
    public function isShowable(): bool
    {
        return $this->status() && $this->isInTime();
    }

    /**
     * This method match current time and
     * appointment time return true if
     * appointment time is now
     *
     * @return bool true|false
     */

    public function isInTime(): bool
    {
        return time() >= $this->startTime() && time() <= $this->endTime();
    }

    /**
     * startTime
     *
     * @return int
     */
    public function startTime(): int
    {
        return strtotime($this->day . ' ' . $this->start);
    }

    /**
     * endTime
     *
     * @return int
     */
    public function endTime(): int
    {
        return strtotime($this->day . ' ' . $this->end);
    }
}
