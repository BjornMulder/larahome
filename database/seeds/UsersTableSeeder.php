<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bjorn Mulder',
            'email' => 'bjrnmulder@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
