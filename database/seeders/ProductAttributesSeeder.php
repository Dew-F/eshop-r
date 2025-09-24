<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('product_attributes')->insert([
            [
            'ProductID' => '1',
            'AttributeID' => '1',
            'Value' => '1024',
            ],
            [
            'ProductID' => '1',
            'AttributeID' => '2',
            'Value' => '1025',
            ],
            [
            'ProductID' => '1',
            'AttributeID' => '3',
            'Value' => '4',
            ],
            [
            'ProductID' => '1',
            'AttributeID' => '4',
            'Value' => '1.3',
            ],
            [
            'ProductID' => '2',
            'AttributeID' => '1',
            'Value' => '1026',
            ],
            [
            'ProductID' => '2',
            'AttributeID' => '2',
            'Value' => '1027',
            ],
            [
            'ProductID' => '2',
            'AttributeID' => '3',
            'Value' => '2',
            ],
            [
            'ProductID' => '2',
            'AttributeID' => '4',
            'Value' => '2.5',
            ],
            [
            'ProductID' => '4',
            'AttributeID' => '1',
            'Value' => '1028',
            ],
            [
            'ProductID' => '4',
            'AttributeID' => '2',
            'Value' => '1029',
            ],
            [
            'ProductID' => '4',
            'AttributeID' => '3',
            'Value' => '3',
            ],
            [
            'ProductID' => '4',
            'AttributeID' => '4',
            'Value' => '1',
            ],
        ]);
    }
}
