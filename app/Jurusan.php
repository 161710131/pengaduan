<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
class Jurusan extends Model
{
    protected $table = 'jurusans';
    protected $fillable = ['nama_jurussan'];

    public function datasiswa()
    {
    	return $this->hasMany('App\Datasiswa', 'id_jurusan');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($jurusan) {
        // mengecek apakah penulis punya buku
        if ($jurusan->datasiswa->count() > 0) {
        // menyiap pesan error
        $html = 'Jurusan tidak bisa dihapus karena masih memiliki siswa : ';
        $html .= '<ul>';
            foreach ($jurusan->datasiswa as $book)
            {
                $html .= "<li>$book->nama</li>";
            }
            $html .= '</ul>';
            Session::flash("flash_notification",[
                "level"=>"danger",
                "message"=>$html
            ]);
            // membatalkan proses penghapusan
            return false;
        }
        });
    }

    public $timestamps = true;
}

?>
