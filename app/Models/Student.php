<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'study',
        'cv',
        'study_year',
    ];

    public function interesses()
    {
        return $this->belongsToMany(Interesse::class, 'student_interesses');
    }
}
