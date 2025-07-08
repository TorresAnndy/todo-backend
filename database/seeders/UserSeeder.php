<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nombre" => "Andy",
            "correo" => "Andy@gmail.com",
            "contrasena" => bcrypt("admin"),
        ]);

        User::create([
            "nombre" => "Andres",
            "correo" => "Andres@gmail.com",
            "contrasena" => bcrypt("admin"),
        ]);

        User::create([
            "nombre" => "Carlitos",
            "correo" => "Carlitos@gmail.com",
            "contrasena" => bcrypt("admin"),
        ]);

        User::create([
            "nombre" => "Roddy",
            "correo" => "Roddy@gmail.com",
            "contrasena" => bcrypt("admin"),
        ]);
    }
}
