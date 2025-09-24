<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            [
                'SubcategoryID' => '1',
                'UnitID' => '1',
                'Name' => 'Ширина экрана',
            ],
            [
                'SubcategoryID' => '1',
                'UnitID' => '1',
                'Name' => 'Высота экрана',
            ],
            [
                'SubcategoryID' => '1',
                'UnitID' => '2',
                'Name' => 'Количество ядер',
            ],
            [
                'SubcategoryID' => '1',
                'UnitID' => '3',
                'Name' => 'Частота работы процессора',
            ],
        ]);
    }
}
