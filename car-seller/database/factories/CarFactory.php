<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Brand;
use \App\Models\Car;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Car::class;

    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $v = $this->faker->unique()->vehicleArray();
        return [
            'model' =>$v['model'],
            'cc'=>$this->faker->numberBetween(1000,4000),
            'hp'=>$this->faker->numberBetween(100,400),
            'brand_id'=>Brand::factory(),
        ];
    }
}
