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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interesses()
    {
        return $this->belongsToMany(Interesse::class, 'student_interesses');
    }

    public function studentInteresses()
    {
        return $this->hasMany(StudentInteresse::class, 'student_id');
    }
}
