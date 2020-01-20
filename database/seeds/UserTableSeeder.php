<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $this->registerData();
        }
    }

    private function registerData()
    {
        User::create([
            'role_id' => '1',
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'mousavi7731@gmail.com',
            'tel' => '09214309687',
            'password' => Hash::make('123'),
            'birth' => 123456,
            'code' => 1234,
        ]);
        User::create([
            'role_id' => '2',
            'name' => 'student',
            'username' => '09214309687',
            'email' => 'mousavi77311@gmail.com',
            'tel' => '09214309686',
            'password' => Hash::make('123'),
            'birth' => 123456,
            'code' => 1234,
        ]);
    }
}
