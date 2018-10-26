<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, rand(1, 100))->create()->each(function ($u) {
            $u->questions()
                ->saveMany(
                    factory(App\Question::class, rand(0, 3))->make()
                );
        });
    }
}
