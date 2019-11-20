<?php

use App\Siswa;

function ranking5besar()
{
    $siswa = Siswa::all();
    $siswa->map(function ($s) {
        $s->rataRataNilai = $s->RataRataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
    return $siswa;
}
