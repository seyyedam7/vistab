<?php

use App\Models\Season;
use App\Models\Video;
use Faker\Factory;
use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
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
        $faker = Factory::create();
        $seasons = Season::all('id');
        foreach ($seasons as $season){
            foreach (range('2',random_int(3,5)) as $item){
                $video = new Video();
                $season->video()->create([
                    'title' => $faker->title,
                    'description' => $faker->paragraph,
                    'view' => random_int(10,1000),
                ]);
            }
        }
    }
}
