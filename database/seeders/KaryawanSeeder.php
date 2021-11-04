<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
        	[
	    		'npk' => 10001,
	        	'nama' => "Agus",
	        	'alamat' => "Jakarta",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'npk' => 10002,
	        	'nama' => "Asep",
	        	'alamat' => "Purbalingga",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'npk' => 10003,
	        	'nama' => "Jajang",
	        	'alamat' => "Subang",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],

        ]);
    }
}
