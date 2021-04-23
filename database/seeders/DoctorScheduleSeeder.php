<?php

namespace Database\Seeders;

use App\Models\DoctorSchedule;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::role('doctor')->each(function ($doctor) {
            $doctor->doctorSchedules()->saveMany([
                new DoctorSchedule([
                    'day' => 'satur',
                    'start' => date("G:i", strtotime('09:30')),
                    'end' => date("G:i", strtotime('18:30')),
                ]),
                new DoctorSchedule([
                    'day' => 'sun',
                    'start' => date("G:i", strtotime('09:30')),
                    'end' => date("G:i", strtotime('18:30')),
                ]),
                new DoctorSchedule([
                    'day' => 'mon',
                    'start' => date("G:i", strtotime('09:30')),
                    'end' => date("G:i", strtotime('18:30')),
                ]),
                new DoctorSchedule([
                    'day' => 'tues',
                    'start' => date("G:i", strtotime('09:30')),
                    'end' => date("G:i", strtotime('18:30')),
                ]),
                new DoctorSchedule([
                    'day' => 'wednes',
                    'start' => date("G:i", strtotime('09:30')),
                    'end' => date("G:i", strtotime('18:30')),
                ]),
            ]);
        });
    }
}
