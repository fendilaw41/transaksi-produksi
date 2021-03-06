<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksis')->insert([
        	[
            'karyawan_id' => 1,
            'tanggal_transaksi' => date('Y-m-d'),
            'lokasi_id' => 1,
            'item_id' => 1,
            'qty' => 10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'karyawan_id' => 1,
            'tanggal_transaksi' => date('Y-m-d'),
            'lokasi_id' => 1,
            'item_id' => 1,
            'qty' => 50,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'karyawan_id' => 1,
            'tanggal_transaksi' => date('Y-m-d'),
            'lokasi_id' => 2,
            'item_id' => 2,
            'qty' => 90,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
