<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacature extends Model
{
    protected $fillable = [
        'title',
        'description',
        'spots_available',
        'start_date',
        'end_date',
        'location',
        'bedrijf_id',
        'status',
    ];

    public function bedrijf()
    {
        return $this->belongsTo(Bedrijf::class, 'bedrijf_id');
    }

    public function interesses()
    {
        return $this->belongsToMany(Interesse::class, 'vacature_interesses');
    }
}
