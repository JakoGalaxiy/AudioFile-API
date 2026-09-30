<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
  public function run(): void
{
    // 1. Crear o buscar un rol primero
    $role = \App\Models\Role::firstOrCreate([
        'name' => 'Administrador', // (Cambia 'name' por 'nombre' si la columna se llama así en tu migración de roles)
    ]);

    // 2. Crear el usuario asignándole el ID del rol creado
    \App\Models\User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'role_id' => $role->id,
    ]);
}
}
