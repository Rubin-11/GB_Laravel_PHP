<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create('ru_Ru');

        // Получаем список категорий и источников
        $categories = DB::table('categories')->pluck('id')->toArray();
        $sources = DB::table('sources')->pluck('id')->toArray();

        // Заполняем таблицу новостей фейковыми данными
        for ($i = 0; $i < 50; $i++) {
            DB::table('news')->insert([
                'title' => $faker->sentence,
                'text' => $faker->paragraph,
                'publication_date' => $faker->date,
                'category_id' => $faker->randomElement($categories),
                'source_id' => $faker->randomElement($sources),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
