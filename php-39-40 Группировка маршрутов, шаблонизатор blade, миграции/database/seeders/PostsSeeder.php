<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->realText(50),
                'content' =>$faker->realText(1500)
            ]);
        }

    }
}
