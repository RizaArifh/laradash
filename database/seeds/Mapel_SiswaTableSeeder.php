<?php

use Illuminate\Database\Seeder;

class Mapel_SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapel_siswa')->insert(
            [[
                'siswa_id'=>'1',
                'mapel_id'=>'1',
                'nilai'=>'75',                
            ],[
                'siswa_id'=>'1',
                'mapel_id'=>'2',
                'nilai'=>'60',                
            ],[
                'siswa_id'=>'2',
                'mapel_id'=>'2',
                'nilai'=>'80',
            ]]);
    }
}
