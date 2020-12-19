<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class HospitalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hospital::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => '9665' . $this->faker->unique()->randomNumber(5),
            'discount' => $this->faker->randomNumber(2),
            'region' => $this->faker->streetAddress,
            'address' => $this->faker->streetAddress,
            'distance' => $this->faker->randomFloat(null,0, 100),
            'rate' => rand(1,5),
            'number_of_raters' => $this->faker->randomNumber(2),
            'number_of_views' => $this->faker->randomNumber(2),
            'about' => $this->faker->text(200),
            'logo' => $this->faker->imageUrl(640, 480),
            'location' => new Point($this->faker->latitude, $this->faker->longitude)
        ];
    }
}
