<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'Name' => 'Пиксель',
                'ShortName' => 'Px',
            ],
            [
                'Name' => '',
                'ShortName' => '',
            ],
            [
                'Name' => 'Герц',
                'ShortName' => 'Гц',
            ],
        ]);
    }
}
