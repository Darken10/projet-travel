<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post\Reponse;
use App\Models\Role;
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\ReponseSeeder;
use Database\Seeders\Root\CoursesSeeder;
use Database\Seeders\Root\LigneSeeder;
use Database\Seeders\Root\RolesSeeder;
use Database\Seeders\Root\StatutsSeeder;
use Database\Seeders\Root\VilleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
        ]);

        $roles = Role::all();
         \App\Models\User::factory(28)->create()->each(fn ($user) => $user->roles()->attach($roles->random(rand(0,3))));

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            StatutsSeeder::class,
            VilleSeeder::class,
            TagSeeder::class,
            ImageSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ReponseSeeder::class,
            LigneSeeder::class,
            //CoursesSeeder::class,
            
        ]);
    }
}
