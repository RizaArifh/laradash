<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswa';
    protected $fillable=['nama_depan','nama_belakang','agama','jenis_kelamin','alamat','avatar','user_id'];

    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/default_profile.png');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot('nilai')->withTimestamps();
    }

    public function RataRataNilai(){

        $total=0;
        $hitung=0;
        
            If($this->mapel->isNotEmpty()){
                foreach($this->mapel as $mapel){
                    $total = $total + $mapel->pivot->nilai;    
                    $hitung++;
                }
                return round($total/$hitung);
            }else{
                return 0;
            }
        
    }
    public function nama_lengkap(){
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}
