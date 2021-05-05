<?php

namespace App\Models;

use Exception;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Haruncpi\LaravelUserActivity\Models\Log;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use HighIdeas\UsersOnline\Traits\UsersOnlineTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Loggable, UsersOnlineTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'blood',
        'gender',
        'user_name',
        'password',
        'address',
        'phone_no',
        'isActive',
        'doctor_category_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User isActive check.
     * 
     * @return true|false
     */

    public function isActive()
    {
        return $this->isActive == 1;
    }

    public function doctorCategory()
    {
        return $this->belongsTo(DoctorCategory::class);
    }

    public function doctorSchedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function patientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function patientCompletedAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id')->where('status', 'completed');
    }

    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function doctorCompletedAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id')->where('status', 'completed');
    }

    public function log()
    {
        return $this->hasMany(Log::class);
    }
    public static function newRegisteredUser($role = null)
    {
        $where = 'where';
        if (is_array($role)) {
            $where = 'whereIn';
        }

        if (Role::$where('name', $role)->exists()) {
            return User::role($role)->where('created_at', '>', Carbon::now()->subDays(7));
        }
        throw new Exception("No Role Found");
        return false;
    }
}
