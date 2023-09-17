<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $this->call(AuthorsTableSeeder::class);
        // publishers 테이블에 레코드 50건을 만든다.
        Publisher::factory(50)->create();
    }
}
