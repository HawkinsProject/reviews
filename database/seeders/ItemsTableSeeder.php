<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'itemName' => 'Dark Horse 1kg',
            'companyName' => 'Five Senses',
            'description' => 'Bold and distinctive full bodied flavour boosted with a chocolate and stone fruit notes.',
            'price' => 52.00,
            'image' => 'product_images/darkhorse.png',
            'URL' => 'www.fivesenses.com.au',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('items')->insert([
            'itemName' => 'Java Gold 250g',
            'companyName' => 'Zarraffas',
            'description' => 'Medium rounded body with citrus and chocolate notes.',
            'price' => 13.50,
            'image' => 'product_images/javagold.png',
            'URL' => 'www.zarraffas.com',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('items')->insert([
            'itemName' => 'Papua New Guinea Single Origin 1kg',
            'companyName' => 'Merlo',
            'description' => "Medium bodied with a honey and chocolate finish",
            'price' => 43.00,
            'image' => 'product_images/papa.png',
            'URL' => 'www.merlo.com.au',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('items')->insert([
            'itemName' => 'Australia Single Origin 200g',
            'companyName' => 'Merlo',
            'description' => "Soft Medium bodied with a dark chocolate and cocoa finish",
            'price' => 13.00,
            'image' => 'product_images/Aus.png',
            'URL' => 'www.merlo.com.au',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('items')->insert([
            'itemName' => 'Kenyan Single Origin 250g',
            'companyName' => 'Zarraffas',
            'description' => "Medium bodied, high citrus notes with a dark chocolate finish",
            'price' => 22.00,
            'image' => 'product_images/kenyan.png',
            'URL' => 'www.zarraffas.com.au',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
