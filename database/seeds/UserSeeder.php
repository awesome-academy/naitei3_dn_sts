<?php

use App\User;
use App\User_profile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function ($user) {
            factory(User_profile::class)->create(['user_id' => $user->id]);
        });
    }
}
