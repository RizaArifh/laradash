<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table="guru";
    protected $fillable=['nama','telepon','alamat'];
    
    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/default_profile.png');
        }
        return asset('images/'.$this->avatar);
    }
    public function mapel(){
        return $this->hasMany(Mapel::class);
    }
}
