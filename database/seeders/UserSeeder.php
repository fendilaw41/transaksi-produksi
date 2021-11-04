<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
