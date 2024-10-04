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
        $gender = $this->faker->randomElement(['male', 'female']);
        $relationship = $this->faker->randomElement(['single', 'married', 'divorced', 'complicated']);
        $education = $this->faker->randomElement(['high school', 'college', 'university']);
        $body = $this->faker->randomElement(['slim', 'athletic', 'average', 'curvy']);
        $ethnicity = $this->faker->randomElement(['caucasian', 'african', 'asian', 'hispanic']);
        $car = $this->faker->randomElement(['mercedez_benz', 'toyota', 'ferrari']);
        $work_status = $this->faker->randomElement(['employed', 'unemploy','self_unemployed']);

        return [
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'avatar' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'location' => $this->faker->address,
            'location' => $this->faker->address,
            'gender' => $gender,
            'work_status' => $work_status,
            'car' => $car,
            'ip_address' => $this->faker->ipv4,
            'phone_number' => $this->faker->phoneNumber,
            'birthday' => $this->faker->date(),
            'height' => $this->faker->numberBetween(110, 280),
            'hair_color' => $this->faker->safeColorName,
            'country' => $this->faker->country,
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'relationship' => $relationship,
            'education' => $education,
            'body' => $body,
            'ethnicity' => $ethnicity,
        ];
    }
}
