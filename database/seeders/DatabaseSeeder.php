<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Document;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        Member::factory()
            ->count(5)
            ->has(Document::factory()->count(2))
            ->create();
    }
}