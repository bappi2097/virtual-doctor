<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyHealth extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'heart_beat',
        'pressure',
        'sugar',
        'extra',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->role('patient');
    }

    /**
     * pressure
     *
     * @param  string $type
     * @return void
     */
    public function pressure($type = 'low')
    {
        return json_decode($this->pressure)->$type;
    }

    /**
     * extra
     *
     * @param  string $type
     * @return void
     */
    public function extra($type = 'bmi')
    {
        return json_decode($this->extra)->$type;
    }
}
