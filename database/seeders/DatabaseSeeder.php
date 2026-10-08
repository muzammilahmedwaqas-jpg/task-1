<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'phone' => '03001234567',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'member1@portal.test'],
            [
                'name' => 'John Doe',
                'phone' => '03001112233',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'member2@portal.test'],
            [
                'name' => 'Jane Smith',
                'phone' => '03004445566',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );
    }
}