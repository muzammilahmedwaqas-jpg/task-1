<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
       
            

            User::UpdateOrCreate([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'phone' => '03001234567',
        'password' => Hash::make('admin123'),
        'is_admin' => true,
    ]);
     User::factory()
            ->count(5)->create([
                'is_admin' => false,
            ]);
            
    }
}