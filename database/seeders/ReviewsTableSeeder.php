<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('reviews')->insert([
            'itemId' => 1,
            'userId' => 1,
            'rating' => 5,
            'reviewComment' => 'Amazing full bodied bean.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 1,
            'userId' => 2,
            'rating' => 5,
            'reviewComment' => 'Great finishes.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 1,
            'userId' => 3,
            'rating' => 5,
            'reviewComment' => 'Never disappoints, a reliable bean.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 1,
            'userId' => 4,
            'rating' => 5,
            'reviewComment' => 'Amazingly smooth and low acidity.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 1,
            'userId' => 5,
            'rating' => 5,
            'reviewComment' => '5/5 would reccommend',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 1,
            'userId' => 1,
            'rating' => 5,
            'reviewComment' => 'Most enjoyable bean.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 2,
            'userId' => 1,
            'rating' => 3,
            'reviewComment' => 'Nice medium bodied bean for everyday use.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 3,
            'userId' => 1,
            'rating' => 4,
            'reviewComment' => 'Great medium bodied bean',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 4,
            'userId' => 1,
            'rating' => 3,
            'reviewComment' => 'Good medium to low bodied bean, quite smooth and pleasant for an afternoon coffee',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 5,
            'userId' => 2,
            'rating' => 1,
            'reviewComment' => 'Very acidic coffee bean, one shot would do any size coffee, quite full bodied',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'itemId' => 5,
            'userId' => 3,
            'rating' => 1,
            'reviewComment' => 'Very acidic, would not reccommend',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
