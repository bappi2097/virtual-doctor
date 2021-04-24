<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $blood = ['o+', 'o-', 'a+', 'a-', 'b+', 'b-', 'ab+', 'ab-', 'g'];
        $gender = ['male', 'female'][rand(0, 1)];
        return [
            'name' => $this->faker->name($gender),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'user_name' => $this->faker->unique()->userName,
            'address' => $this->faker->address,
            'isActive' => 1,
            'phone_no' => $this->faker->phoneNumber,
            'image' => 'assets/images/users/' . rand(1, 7) . '.jpg',
            'blood' => $blood[rand(0, 8)],
            'gender' => $gender,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
