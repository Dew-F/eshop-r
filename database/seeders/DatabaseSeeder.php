<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(class:RolesSeeder::class);
        $this->call(class:UsersSeeder::class);
        $this->call(class:CategoriesSeeder::class);
        $this->call(class:SubcategoriesSeeder::class);
        $this->call(class:UnitsSeeder::class);
        $this->call(class:ProductsSeeder::class);
        $this->call(class:AttributesSeeder::class);
        $this->call(class:ProductAttributesSeeder::class);
        $this->call(class:ProductImagesSeeder::class);
        //$this->call(class:OrderSeeder::class);
        //$this->call(class:OrderProductSeeder::class);
        $this->call(class:IncomingSeeder::class);
    }
}
