<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AchivementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achivements')->insert([
        	[
	    		'kode' => "A001",
	        	'time_from' => "07:31",
	        	'time_to' => "08:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A002",
	        	'time_from' => "08:31",
	        	'time_to' => "09:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A003",
	        	'time_from' => "09:31",
	        	'time_to' => "10:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A004",
	        	'time_from' => "10:31",
	        	'time_to' => "11:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A005",
	        	'time_from' => "11:31",
	        	'time_to' => "12:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A006",
	        	'time_from' => "12:31",
	        	'time_to' => "13:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A007",
	        	'time_from' => "13:31",
	        	'time_to' => "14:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A008",
	        	'time_from' => "14:31",
	        	'time_to' => "15:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A009",
	        	'time_from' => "15:31",
	        	'time_to' => "16:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A010",
	        	'time_from' => "16:31",
	        	'time_to' => "17:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A011",
	        	'time_from' => "17:31",
	        	'time_to' => "18:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A012",
	        	'time_from' => "18:31",
	        	'time_to' => "19:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'kode' => "A013",
	        	'time_from' => "19:31",
	        	'time_to' => "20:30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
        ]);
    }
}
