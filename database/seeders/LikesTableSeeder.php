<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            'userId' => 1,
            'reviewId' => 1,
            'LikeTotal' => 1,
            'disLikeTotal' => 0,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('likes')->insert([
            'userId' => 1,
            'reviewId' => 2,
            'LikeTotal' => 0,
            'disLikeTotal' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('likes')->insert([
            'userId' => 2,
            'reviewId' => 1,
            'LikeTotal' => 1,
            'disLikeTotal' => 0,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('likes')->insert([
            'userId' => 3,
            'reviewId' => 1,
            'LikeTotal' => 1,
            'disLikeTotal' => 0,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('likes')->insert([
            'userId' => 4,
            'reviewId' => 2,
            'LikeTotal' => 1,
            'disLikeTotal' => 0,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('likes')->insert([
            'userId' => 4,
            'reviewId' => 1,
            'LikeTotal' => 1,
            'disLikeTotal' => 0,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('likes')->insert([
            'userId' => 3,
            'reviewId' => 10,
            'LikeTotal' => 0,
            'disLikeTotal' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('likes')->insert([
            'userId' => 4,
            'reviewId' => 10,
            'LikeTotal' => 0,
            'disLikeTotal' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
