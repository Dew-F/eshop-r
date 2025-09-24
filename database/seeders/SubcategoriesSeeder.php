<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'Name' => 'Смартфоны',
                'CategoryID' => '1',
                'Image' => 'smartphone.png',
            ],
            [
                'Name' => 'Смарт-часы',
                'CategoryID' => '1',
                'Image' => 'smart_clock.png',
            ],
            [
                'Name' => 'Телевизоры',
                'CategoryID' => '2',
                'Image' => 'tv.png',
            ],
            [
                'Name' => 'Ноутбуки',
                'CategoryID' => '3',
                'Image' => 'laptop.png',
            ],
            [
                'Name' => 'Принтеры',
                'CategoryID' => '4',
                'Image' => 'printer.png',
            ],
            [
                'Name' => 'Электрочайники',
                'CategoryID' => '5',
                'Image' => 'electric_kettle.png',
            ],
            [
                'Name' => 'Электросамокаты',
                'CategoryID' => '6',
                'Image' => 'electric_scooter.png',
            ],
            [
                'Name' => 'Лампы',
                'CategoryID' => '7',
                'Image' => 'lamp.png',
            ],
            [
                'Name' => 'Наушники',
                'CategoryID' => '8',
                'Image' => 'headphones.png',
            ]
        ]);
    }
}
