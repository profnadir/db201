<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FormateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formateurs')->insert([
                  'nom'=> Str::random(10),
                  'prenom'=>Str::random(10),
                  'age'=>rand(30,60)
        ]);
            
    }
}
