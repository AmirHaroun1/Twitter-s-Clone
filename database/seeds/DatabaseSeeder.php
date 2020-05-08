<?php

use Illuminate\Database\Seeder;
use App\tweet;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\user::all();

        foreach ($users as $user)
        {
            factory(App\tweet::class,100000)->create([
               'user_id'=>$user->id,
            ]);
        }
    }
}
