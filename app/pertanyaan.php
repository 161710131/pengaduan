<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    protected $table = 'pertanyaans';
    protected $fillable = ['id_siswa','pertanyaan'];

    public function datasiswa() {
        return $this->belongsTo('App\Datasiswa','id_siswa');
    }
    public function jawab (){
        return $this->hasMany('App\jawaban','id_pertanyaan');
    }
}
