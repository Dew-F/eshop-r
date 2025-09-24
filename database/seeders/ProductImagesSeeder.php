<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            [
                'ProductID' => '5',
                'Image' => 'Чайник_0.png',
                'Num' => '0',
            ],
            [
                'ProductID' => '5',
                'Image' => 'iphone_0.png',
                'Num' => '1',
            ],
            [
                'ProductID' => '5',
                'Image' => 'samsung_0.png',
                'Num' => '2',
            ],
            [
                'ProductID' => '1',
                'Image' => 'iphone_0.png',
                'Num' => '0',
            ],
            [
                'ProductID' => '2',
                'Image' => 'samsung_0.png',
                'Num' => '0',
            ],
            [
                'ProductID' => '3',
                'Image' => 'smartwatch_0.png',
                'Num' => '0',
            ],
            [
                'ProductID' => '4',
                'Image' => 'vivo_0.png',
                'Num' => '0',
            ],
        ]);
    }
}
