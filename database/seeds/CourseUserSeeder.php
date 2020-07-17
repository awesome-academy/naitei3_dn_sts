<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) 
        {
            DB::table('course_user')->insert([
                'course_id' => $index,
                'user_id' => $faker->numberBetween(1, 10),
                'role' => rand(0, 1),
                'start_day' => $faker->dateTime,
                'end_day' => $faker->dateTime,
            ]);
        }
    }
}
