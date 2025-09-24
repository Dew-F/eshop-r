<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Name' => 'Admin',
            'Email' => 'Admin@mail.ru',
            'Password' => Hash::make('Admin@mail.ru'),
            'RoleID' => 2,
        ]);
    }
}
