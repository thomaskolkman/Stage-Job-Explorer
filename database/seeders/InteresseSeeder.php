<?php

namespace Database\Seeders;

use App\Models\Interesse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InteresseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interesse::create([
            'name' => 'PHP',
            'type' => 'programmeertalen',
        ]);
        Interesse::create([
            'name' => 'CSS',
            'type' => 'programmeertalen',
        ]);
        Interesse::create([
            'name' => 'HTML',
            'type' => 'programmeertalen',
        ]);
    }
}
