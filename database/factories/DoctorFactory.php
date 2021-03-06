<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_US\Company;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name" => $this->faker->name,
            'phone' => '9665' . $this->faker->unique()->randomNumber(5),
            'location' => $this->faker->latitude.','. $this->faker->longitude,
            'address' => $this->faker->streetAddress,
            'position_id' => rand(1, 18),
            'rate' => 4.5,
            'basic_price' => 300,
            'treat_price' => 310,
            'about' => $this->faker->text(200)
        ];
    }
}
