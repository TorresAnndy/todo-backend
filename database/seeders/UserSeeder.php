<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRol = Rol::where('name', 'Admin')->first();
        $usuarioRol = Rol::where('name', 'Usuario')->first();

        if (!$adminRol || !$usuarioRol) {
            $this->command->error('Faltan roles. Ejecuta primero el RolSeeder.');
            return;
        }

        $usuarios = [
            [
                "name" => "Andy",
                "email" => "Andy@gmail.com",
                "rol_id" => $adminRol->_id,
            ],
            [
                "name" => "Andres",
                "email" => "Andres@gmail.com",
                "rol_id" => $adminRol->_id,
            ],
            [
                "name" => "Carlitos",
                "email" => "Carlitos@gmail.com",
                "rol_id" => $adminRol->_id,
            ],
            [
                "name" => "Roddy",
                "email" => "Roddy@gmail.com",
                "rol_id" => $adminRol->_id,
            ],
            [
                "name" => "Usuario1",
                "email" => "usuario1@gmail.com",
                "rol_id" => $usuarioRol->_id,
            ],
            [
                "name" => "Usuario2",
                "email" => "usuario2@gmail.com",
                "rol_id" => $usuarioRol->_id,
            ]
        ];

        foreach ($usuarios as $data) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt('admin'),
                'rol_id' => $data['rol_id'],
            ]);
        }
    }
}
