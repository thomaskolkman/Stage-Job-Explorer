<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'study',
        'availability',
        'cv',
        'current_phase',
    ];

    public function interesses()
    {
        return $this->belongsToMany(Interesse::class, 'student_interesses');
    }
}
