<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

use App\Faculty;
use App\University;
use App\Branch;
use App\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            
            //UniversitieSeeder::class,
            //FacultieSeeder::class,
            //BrancheSeeder::class,
            //StudentSeeder::class
        ]);
    }
}
