<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(15)->create()->each(function ($user) {
            $user->assignRole('patient');
        });
        $user = \App\Models\User::create([
            "name" => "Patient",
            "email" => "patient@mail.com",
            "phone_no" => "+99-555-248",
            "address" => "Rangpur, Bangladesh",
            "user_name" => "patient23",
            "image" => "assets/images/users/2.jpg",
            "password" => bcrypt("password"),
        ]);
        $user->assignRole('patient');
    }
}
