<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::count()){
            $this->registerData();
        }
    }

    private function registerData()
    {
        Role::create([
            'title'=>'teacher'
        ]);
        Role::create([
            'title'=>'student'
        ]);
    }

}
