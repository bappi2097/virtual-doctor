<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyHealth extends Model
{
    use HasFactory, SoftDeletes;

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
}
