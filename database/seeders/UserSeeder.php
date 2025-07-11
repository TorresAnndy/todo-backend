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
            "name" => "Andy",
            "email" => "Andy@gmail.com",
            "password" => bcrypt("admin"),
        ]);

        User::create([
            "name" => "Andres",
            "email" => "Andres@gmail.com",
            "password" => bcrypt("admin"),
        ]);

        User::create([
            "name" => "Carlitos",
            "email" => "Carlitos@gmail.com",
            "password" => bcrypt("admin"),
        ]);

        User::create([
            "name" => "Roddy",
            "email" => "Roddy@gmail.com",
            "password" => bcrypt("admin"),
        ]);
    }
}
