<?php

namespace Database\Seeders\Root;

use App\Models\Statut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statut::create([
            'name'=> 'Active',
        ]);
        Statut::create([
            'name'=> 'Désactive',
        ]);
        Statut::create([
            'name'=> 'Pause',
        ]);
        Statut::create([
            'name'=> 'Archiver',
        ]);
        Statut::create([
            'name'=> 'Payer',
        ]);
        Statut::create([
            'name'=> 'Non Payer',
        ]);
        Statut::create([
            'name'=> 'Déja Utiliser',
        ]);
        Statut::create([
            'name'=> 'Expirer',
        ]);
        Statut::create([
            'name'=> 'Bloquer',
        ]);
        Statut::create([
            'name'=> 'suspendu',
        ]);
        Statut::create([
            'name'=> 'Reserver',
        ]);
    }
}
