<?php

namespace Database\Seeders;

use App\Models\Hotspot;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
        // Crear un usuario administrador
        User::create([
            'name' => 'Admin',
            'email' => 'lrmaldo@gmail.com',
            'password' => bcrypt('12345678'), // Asegúrate de usar un hash seguro
        ]);
        //hotspot
        Hotspot::create([
            'name' => 'Zona Principal',
            'descripcion' => 'Descripción del hotspot 1',
            'activo' => true,
        ]);
    }
}
