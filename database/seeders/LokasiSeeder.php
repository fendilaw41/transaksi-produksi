<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('lokasis')->insert([
        	[
	    		'kode' => "L001",
	        	'nama_lokasi' => "Lokasi 1",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	       [
	    		'kode' => "L002",
	        	'nama_lokasi' => "Lokasi 2",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "L003",
	        	'nama_lokasi' => "Lokasi 3",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "L004",
	        	'nama_lokasi' => "Lokasi 4",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
        ]);
    }
}
