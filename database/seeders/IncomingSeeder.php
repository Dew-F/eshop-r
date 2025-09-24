<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incomings')->insert([
            [
                'ProductID' => '1',
                'Count' => '100',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
            [
                'ProductID' => '2',
                'Count' => '15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductID' => '3',
                'Count' => '14',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductID' => '4',
                'Count' => '11',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductID' => '5',
                'Count' => '16',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
