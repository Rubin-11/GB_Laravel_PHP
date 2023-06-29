<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ru_Ru');

        for ($i = 0; $i < 10; $i++) {
            DB::table('sources')->insert([
                'name' => $faker->company,
                'url' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
