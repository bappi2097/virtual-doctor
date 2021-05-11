<?php

namespace Database\Factories;

use App\Models\Info;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Tags\Tag;

class InfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Info::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $admin = User::role(['admin', 'doctor'])->pluck('id')->all();
        return [
            'title' => $this->faker->realText(10, 2),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'details' => $this->faker->realText(30, 2),
            'created_by' => $admin[array_rand($admin)],
            'is_active' => true,
        ];
    }
}
