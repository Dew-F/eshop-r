<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'Name' => 'Смартфоны и гаджеты',
                'Icon' => 'fa-solid fa-mobile-screen',
            ],
            [
                'Name' => 'ТВ и мультимедиа',
                'Icon' => 'fa-solid fa-tv',
            ],
            [
                'Name' => 'Компьютеры',
                'Icon' => 'fa-solid fa-computer',
            ],
            [
                'Name' => 'Офис и сеть',
                'Icon' => 'fa-solid fa-print',
            ],
            [
                'Name' => 'Бытовая техника',
                'Icon' => 'fa-solid fa-blender',
            ],
            [
                'Name' => 'Отдых и развлечения',
                'Icon' => 'fa-brands fa-xbox',
            ],
            [
                'Name' => 'Строительство и ремонт',
                'Icon' => 'fa-solid fa-lightbulb',
            ],
            [
                'Name' => 'Аксессуары',
                'Icon' => 'fa-solid fa-headphones',
            ]
        ]);
    }
}
