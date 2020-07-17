<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubjectUserSeeder extends Seeder
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
            DB::table('subject_user')->insert([
                'subject_id' => $index,
                'user_id' => $faker->numberBetween(1, 10),
                'status' => rand(0, 2),
                'start_day' => $faker->dateTime,
                'end_day' => $faker->dateTime,
            ]);
        }
    }
}
