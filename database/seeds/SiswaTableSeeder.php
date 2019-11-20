<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert(
        [[
            'nama_depan'=>'Riza',
            'nama_belakang'=>'Arif',
            'agama'=>'islam',
            'jenis_kelamin'=>'L',
            'alamat'=>'sragen'

        ],[
            'nama_depan'=>' M Azki',
            'nama_belakang'=>'Kuncoro',
            'agama'=>'islam',
            'jenis_kelamin'=>'L',
            'alamat'=>'Bontang'
        
        ],[
            'nama_depan'=>' Dhika',
            'nama_belakang'=>'Bayu K',
            'agama'=>'islam',
            'jenis_kelamin'=>'L',
            'alamat'=>'Purwokerto'
        ]]
    );
    }
}
