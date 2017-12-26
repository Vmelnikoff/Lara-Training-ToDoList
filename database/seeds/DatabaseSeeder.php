<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('tasks')->insert([
                'title' => 'Задача ' . $i,
                'description' => $faker->realText(),
                'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
