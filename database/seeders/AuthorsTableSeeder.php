<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Faker를 사용해 Authors 테이블에 레코드를 10건 등록한다
        for ($i = 1; $i <= 10; $i++) {
            $author = [
                'name' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('authors')->insert($author);
        }
    }
}
