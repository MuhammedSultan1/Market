<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('products')->insert([
             [
            'name'=>'Oppo mobile',
            'price'=>'350',
            'category'=>'mobile',
            'gallery'=>'https://image.oppo.com/content/dam/oppo/common/mkt/v2-2/navigation/reno-series/reno3-pro/4g/Reno3%20Pro-Raphael4G-navigation-Blue-v2.png'
             ]
         ]);
    }
}