<?php

namespace Database\Seeders\Root;

use App\Models\Root\Ville;
use App\Models\User;
use App\Models\Voyage\Ligne;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LigneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villes = Ville::all();
        $villes->each(fn ($villes) => Ligne::create([
            'depart_id' => rand(1,8),
            'destination_id' => rand(1,8),
            'distance' => rand(10,500),
            'user_id' => rand(1,5),

        ]));
    }
}
