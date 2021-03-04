<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $position_id = Position::all()->random()->id;
        $phoneFormat = '+380 (##) ### ## ##';

        return [
            'name' => $this->faker->name,
            'position_id' => $position_id,
            'employment_date' => $this->faker->dateTimeBetween( '-5 years') ,
            'phone_number' => $this->faker->unique()->numerify($phoneFormat),
            'email' => $this->faker->unique()->email,
            'salary' => $this->faker->randomFloat(2,0, 50000),
            'photo' => $this->faker->imageUrl(300, 300)
        ];
    }
}
