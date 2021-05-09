<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(15)->create()->each(function ($user) {
            $user->update(['doctor_category_id' => rand(1, 4)]);
            $user->assignRole('doctor');
        });
        $user = \App\Models\User::create([
            "name" => "Doctor",
            "email" => "doctor@mail.com",
            "phone_no" => "+99-555-248",
            "address" => "Rangpur, Bangladesh",
            "user_name" => "doctor23",
            "password" => bcrypt("password"),
            'doctor_category_id' => rand(1, 4),
        ]);
        $user->assignRole('doctor');
    }
}
