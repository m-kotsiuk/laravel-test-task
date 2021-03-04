<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    protected function generate(int $iteration = 0)
    {
        //9
        $employees = Employee::factory()
            ->times(9)
            ->create();


        if (4 > $iteration)  {
            $employees->each(function (Employee $employee) use ($iteration) {
                $employee
                    ->children()
                    ->saveMany($this->generate($iteration + 1));
            });
        }

        return $employees;
    }

    public function run()
    {
        $this->generate();
    }
}
