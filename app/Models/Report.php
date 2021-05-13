<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'title',
        'description'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->role('patient');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
