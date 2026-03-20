<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sollicitatie extends Model
{
    protected $fillable = [
        'student_id',
        'vacature_id',
        'status',
        'applied_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function vacature()
    {
        return $this->belongsTo(Vacature::class);
    }
}
