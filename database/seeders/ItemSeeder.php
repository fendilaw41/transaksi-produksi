<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('items')->insert([
        	[
	    		'kode' => "M001",
	        	'nama_item' => "Bolpen",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	       [
	    		'kode' => "M002",
	        	'nama_item' => "Pensil",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "M003",
	        	'nama_item' => "Penghapus",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "M004",
	        	'nama_item' => "Spidol",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
        ]);
    }
}
