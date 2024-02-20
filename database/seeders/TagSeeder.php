<?php

namespace Database\Seeders;

use App\Models\Post\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags  = collect(['Promo','annonce','Fantastique','Romance','Epouvante','Horreur','Amour','Desception']);
        $users = User::all();
        $tags->each(fn ($tags) => Tag::create([
            'name'=> $tags ,
            'user_id' => $users->random()->id
        ]));
    }
}
