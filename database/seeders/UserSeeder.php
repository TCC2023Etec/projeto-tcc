<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mural Aluno',
            'email' => 'mural.aluno@test.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'aluno',
            'curso_id' => 1
        ]);

        User::create([
            'name' => 'Mural Professor',
            'email' => 'mural.prof@test.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'professor'
        ]);

        User::create([
            'name' => 'Mural Administrador',
            'email' => 'mural.admin@test.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'administrador'
        ]);
    }
}
