<?php

use App\Badge;
use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $badges = Badge::all();

        foreach(range(1,5) as $index)
        {
            $employee = Employee::create([
                'name' => $faker->name,
                'position' => $faker->sentence(3)
            ]);

            $employee->badges()->sync($badges->random(rand(1, $badges->count())));
            $employee->addMediaFromUrl(public_path('images/employees/'.$index.'.png'))->toMediaCollection('photo');
        }
    }
}
