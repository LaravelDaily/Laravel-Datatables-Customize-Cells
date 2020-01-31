<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$sLyxJ2jV5HVAfAZJysSGe.y.s4X/6XNI68MyhsQhHUBwjhPHxeUPe',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
