<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 150; $i++) {
            $user->save(
                [
                    'username'    =>    $faker->userName,
                    'email'       =>    $faker->email,
                    'gender'      =>    $faker->randomElement(['laki-laki', 'perempuan']),
                    'status'      =>    $faker->randomElement(['active', 'inactive']),
                    'created_at'  =>    Time::createFromTimestamp($faker->unixTime()),
                    'updated_at'  =>    Time::now()
                ]
            );
        }
    }
}
