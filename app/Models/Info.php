<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Tags\Tag;

class Info extends Model
{
    use HasFactory, HasTags;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'address',
        'phone',
        'details',
        'is_active',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
