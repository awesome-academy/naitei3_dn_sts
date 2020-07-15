<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TaskUserSeeder extends Seeder
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
            DB::table('task_user')->insert([
                'task_id' => $index,
                'user_id' => $faker->numberBetween(1, 10),
                'status' => rand(0, 2),
                'report_content' => $faker->text,
            ]);
        }
    }
}
