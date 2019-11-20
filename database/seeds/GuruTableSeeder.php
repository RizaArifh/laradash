<?php

use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guru')->insert(
            [[
                'nama'=>'Danu',
                'telepon'=>'082235837213',
                'alamat'=>'malang',                
            ],[
                'nama'=>'Alvin',
                'telepon'=>'083726132183',
                'alamat'=>'surakarta',                
            ],[
                'nama'=>'oman',
                'telepon'=>'082736271623',
                'alamat'=>'sragen',
            ]]);
    }
}
