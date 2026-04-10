<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInteresse extends Model
{
    protected $fillable = [
    'student_id',
    'interesse_id',
    'status',
    'applied_at'
];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function interesse()
    {
        return $this->belongsTo(Interesse::class, 'interesse_id');
    }
}
