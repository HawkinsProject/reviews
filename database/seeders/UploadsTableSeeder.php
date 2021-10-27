<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UploadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uploads')->insert([
            'itemId' => 1,
            'userId' => 1,
            'photos' => 'product_images/Aus.png',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('uploads')->insert([
            'itemId' => 2,
            'userId' => 3,
            'photos' => 'product_images/brenner.png',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('uploads')->insert([
            'itemId' => 3,
            'userId' => 4,
            'photos' => 'product_images/darkhorse.png',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
