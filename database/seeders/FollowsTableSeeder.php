<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            'currentUserId' => 1,
            'followsUserId' => 2,
            'reviewId' => 2,
            'itemId' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('follows')->insert([
            'currentUserId' => 1,
            'followsUserId' => 3,
            'reviewId' => 3,
            'itemId' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('follows')->insert([
            'currentUserId' => 2,
            'followsUserId' => 1,
            'reviewId' => 1,
            'itemId' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('follows')->insert([
            'currentUserId' => 2,
            'followsUserId' => 3,
            'reviewId' => 3,
            'itemId' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('follows')->insert([
            'currentUserId' => 3,
            'followsUserId' => 1,
            'reviewId' => 9,
            'itemId' => 4,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('follows')->insert([
            'currentUserId' => 3,
            'followsUserId' => 1,
            'reviewId' => 8,
            'itemId' => 3,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

    }
}
