<?php

use App\Models\Course;
use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->registerData();
    }

    private function registerData()
    {
        $courses = Course::all('id');
        foreach ($courses as $course){
            foreach (range('2',random_int(3,6)) as $item){
                $season = new Season(['id']);
                $course->season()->create();
            }
        }
    }
}
