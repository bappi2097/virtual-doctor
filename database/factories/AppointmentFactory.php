<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\DoctorCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = rand(1, 4);
        $doctor = User::where('doctor_category_id', $category)->pluck('id')->all();
        $patient = User::role('patient')->pluck('id')->all();
        return [
            'doctor_category_id' => $category,
            'doctor_id' => $doctor[array_rand($doctor)],
            'patient_id' => $patient[array_rand($patient)],
            'day' => $this->faker->date('Y-m-d', 'now'),
            'start' => $this->faker->time('H:i:s', 'now'),
            'end' => $this->faker->time('H:i:s', 'now'),
            'description' => $this->faker->realText(1000, 2),
        ];
    }
}
