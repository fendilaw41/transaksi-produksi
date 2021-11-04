<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('plannings')->insert([
        	[
	    		'item_id' => 1,
	        	'qty' => "10",
	        	'waktu_target' => "20",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'item_id' => 2,
	        	'qty' => "15",
	        	'waktu_target' => "30",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'item_id' => 3,
	        	'qty' => "12",
	        	'waktu_target' => "24",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
	        [
	    		'item_id' => 4,
	        	'qty' => "14",
	        	'waktu_target' => "28",
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
        ]);
    }
}
