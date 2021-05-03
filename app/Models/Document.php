<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'report_id',
        'file_name',
        'path',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->role('patient');
    }
}
