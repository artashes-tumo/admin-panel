<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                "email" => "super@test.test",
            ],
            [
                "name" => "Super Admin",
                'role' => 'super-admin',
                "password" => bcrypt("Asdasd123"),
            ]
        );

        User::updateOrCreate(
            [
                "email" => "admin@test.test",
            ],
            [
                "name" => "Admin",
                'role' => 'admin',
                "password" => bcrypt("Asdasd123"),
            ]
        );

        User::updateOrCreate(
            [
                "email" => "writer@test.test",
            ],
            [
                "name" => "Writer",
                'role' => 'writer',
                "password" => bcrypt("Asdasd123"),
            ]
        );
    }
}
