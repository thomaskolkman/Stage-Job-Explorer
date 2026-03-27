<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bedrijf extends Model
{
    protected $table = 'bedrijven';

    protected $fillable = [
        'name',
        'email',
        'address',
        'description',
        'website',
        'location',
    ];

    public function vacatures()
    {
        return $this->hasMany(Vacature::class);
    }
}
