<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseSubjectSeeder extends Seeder
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
            DB::table('course_subject')->insert([
                'course_id' => $index,
                'subject_id' => $faker->numberBetween(1, 10),
                'status' => rand(0, 2),
            ]);
        }
    }
}
