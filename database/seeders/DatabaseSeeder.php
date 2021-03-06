<?php

namespace Database\Seeders;

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
        $this->call(UsersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(UploadsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
       
       
    }
}
