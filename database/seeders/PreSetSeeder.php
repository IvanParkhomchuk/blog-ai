<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreSetSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BlogSeeder::class,
            PostSeeder::class,
        ]);
    }
}
