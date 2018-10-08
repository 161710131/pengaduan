<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataadmin extends Model
{
    protected $table = 'dataadmins';
    protected $fillable = ['id_user','nipd'];

    public function user() {
		return $this->belongsTo('App\User', 'id_user');
    }
}
?>
