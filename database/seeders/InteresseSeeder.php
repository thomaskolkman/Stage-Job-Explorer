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
        $interesses = [
            ['name' => 'PHP', 'type' => 'programmeertalen'],
            ['name' => 'CSS', 'type' => 'programmeertalen'],
            ['name' => 'HTML', 'type' => 'programmeertalen'],
            ['name' => 'Communicatie', 'type' => 'softskills'],
            ['name' => 'Samenwerken', 'type' => 'softskills'],
            ['name' => 'Probleemoplossing', 'type' => 'softskills'],
            ['name' => 'Zelfstandig werken', 'type' => 'softskills'],
            ['name' => 'Leergierig', 'type' => 'softskills'],
            ['name' => 'Front end', 'type' => 'stagevoorkeuren'],
            ['name' => 'Back end', 'type' => 'stagevoorkeuren'],
            ['name' => 'Stagevergoeding', 'type' => 'stagevoorkeuren'],
            ['name' => 'Groot bedrijf', 'type' => 'stagevoorkeuren'],
            ['name' => 'Klein bedrijf', 'type' => 'stagevoorkeuren'],
            ['name' => 'Februari - Juni', 'type' => 'stageperiode'],
            ['name' => 'October - Februari', 'type' => 'stageperiode'],
        ];

        foreach ($interesses as $interesse) {
            Interesse::updateOrCreate([
                'name' => $interesse['name'],
            ], [
                'type' => $interesse['type'],
            ]);
        }
    }
}
