<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Ashraf Shovon",
            "email" => "admin@admin.com",
            "phone_no" => "+99-555-248",
            "address" => "Rangpur, Bangladesh",
            "user_name" => "admin12",
            "password" => bcrypt("password"),
        ]);
        $user->assignRole('admin');
        $user->assignRole('super');

        \App\Models\User::factory(15)->create()->each(function ($user) {
            $user->assignRole('admin');
        });
    }
}
