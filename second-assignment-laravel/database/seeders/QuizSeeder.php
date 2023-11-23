<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 17; $i++) {
            DB::table('quizzes')->insert([
                'name' => 'Quiz-' . Str::random(10),
                'description' => 'Description for Quiz ' . Str::random(10),
                'status' => rand(0, 1), 
                'grade' => rand(0, 100), 
                'image_path' => 'image' . $i . '.jpg', 
            ]);
        }
    }
}
