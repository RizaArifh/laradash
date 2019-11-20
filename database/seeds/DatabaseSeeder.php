<?php

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
        // $this->call(SiswaTableSeeder::class);
        // $this->call(MapelTableSeeder::class);
        // $this->call(Mapel_SiswaTableSeeder::class);
        $this->call(GuruTableSeeder::class);
    }
}
