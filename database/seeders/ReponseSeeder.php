<?php

namespace Database\Seeders;

use App\Models\Post\Reponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reponse::factory(20)->create();
    }
}
