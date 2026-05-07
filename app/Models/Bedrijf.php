<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bedrijf extends Model
{
    protected $table = 'bedrijven';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'description',
        'website',
        'location',
        'industry',
    ];

    public function vacatures()
    {
        return $this->hasMany(Vacature::class);
    }
}
