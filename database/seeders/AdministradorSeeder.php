<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrador::create([
            'nome' => 'Admin Mural',
            'email' => 'admin@mural.com',
            'senha' => '12345678'
        ]);
    }
}
