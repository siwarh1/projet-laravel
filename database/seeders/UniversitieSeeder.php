<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;


class UniversitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $description = '';
        foreach ($faker->paragraphs(3, false) as $paragraph) {
            $description .= "$paragraph<br>";
        }

        foreach (range(1, 10) as $index) {
            DB::table('universities')->insert([
                'name' => "University of " . $faker->unique()->city,
                'description' => $description,
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
