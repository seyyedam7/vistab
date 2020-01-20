<?php

use \Faker\Factory;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Course::count()) {
            $this->registerData();
        }
    }

    private function registerData()
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 25; $i++) {
            Course::create([
                'title' => 'Course' . $i . ' ' . $faker->title,
                'description' => $faker->paragraph,
                'price' => random_int(10000 , 500000),
                'discount' => random_int(10 , 50).'%',
            ]);
        }

    }
}
