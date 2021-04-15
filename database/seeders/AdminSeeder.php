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
            "password" => bcrypt("password"),
        ]);
        $user->assignRole('admin');
    }
}
