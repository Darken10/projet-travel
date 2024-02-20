<?php

namespace Database\Seeders\Root;

use App\Models\Root\Pays;
use App\Models\Root\Ville;
use App\Models\Root\Region;
use App\Models\Root\Province;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Pays::create([
            'name'=> 'Burkina Faso' ,
            'numero_identifiant' => '+226',
        ]);
        

        // Regions
        Region::create([
            'name'=> 'Boucle du Mouhoun' ,
            'pays_id'=> '1'
        ]);
        Region::create([
            'name'=> 'Haut Bassin' ,
            'pays_id'=> '1'
        ]);
        Region::create([
            'name'=> 'Centre' ,
            'pays_id'=> '1'
        ]);

        //provinces
        Province::create([
            'name'=> 'Mouhoun' ,
            'region_id'=> '1'
        ]);
        Province::create([
            'name'=> 'Sourou' ,
            'region_id'=> '1'
        ]);
        Province::create([
            'name'=> 'Cascades' ,
            'region_id'=> '2'
        ]);
        Province::create([
            'name'=> 'Houet' ,
            'region_id'=> '2'
        ]);
        Province::create([
            'name'=> 'Kadiogo' ,
            'region_id'=> '3'
        ]);

        // villes
        Ville::create([
            'name'=> 'Dédougou' ,
            'province_id'=> '1'
        ]);
        Ville::create([
            'name'=> 'Souri' ,
            'province_id'=> '1'
        ]);
        Ville::create([
            'name'=> 'Bobo Dioulasso' ,
            'province_id'=> '4'
        ]);
        Ville::create([
            'name'=> 'Tougan' ,
            'province_id'=> '2'
        ]);
        Ville::create([
            'name'=> 'Bama' ,
            'province_id'=> '4'
        ]);
        Ville::create([
            'name'=> 'Nasso' ,
            'province_id'=> '4'
        ]);
        Ville::create([
            'name'=> 'Banfora' ,
            'province_id'=> '3'
        ]);
        Ville::create([
            'name'=> 'Ouagadougou' ,
            'province_id'=> '5'
        ]);
        
        
    }
}
