<?php

use Illuminate\Database\Seeder;

class MapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapel')->insert(
            [[
                'nama'=>'Layanan Web',
                'kode'=>'001',
                'semester'=>'ganjil',                
            ],[
                'nama'=>'Sistem Informasi',
                'kode'=>'002',
                'semester'=>'genap',                
            ],[
                'nama'=>'Rekayasa Perangkat Lunak',
                'kode'=>'003',
                'semester'=>'ganjil',
            ]]);
        
    }
}
