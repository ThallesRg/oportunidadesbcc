<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* create admin, author and user */
        /* password for these users is password */

        $factoryUsers = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$Lq7XgREO7A5qRp6HlLOKIeITo3Sf5lFLaD53DKXmqHn4y9Av8qSNu', // password
                'role' => 'admin'
            ],

            [
                'name' => 'autor',
                'email' => 'autor@autor.com',
                'password' => '$2y$10$Lq7XgREO7A5qRp6HlLOKIeITo3Sf5lFLaD53DKXmqHn4y9Av8qSNu', // password
                'role' => 'author'
            ],

            [
                'name' => 'simples',
                'email' => 'user@user.com',
                'password' => '$2y$10$Lq7XgREO7A5qRp6HlLOKIeITo3Sf5lFLaD53DKXmqHn4y9Av8qSNu', // password
                'role' => 'user'
            ],
        ];

        foreach ($factoryUsers as $user) {
            $newUser =  User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
            $newUser->assignRole($user['role']);
        }
    }
}
