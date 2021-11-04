<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KaryawanSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(LokasiSeeder::class);
        $this->call(AchivementSeeder::class);
        $this->call(PlanningSeeder::class);
        $this->call(TransaksiSeeder::class);
    }
}
