<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];

    public function datasiswa()
    {
    	return $this->hasMany('App\Datasiswa', 'id_kelas');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function($kelas) {
        // mengecek apakah penulis punya buku
        if ($kelas->datasiswa->count() > 0) {
        // menyiap pesan error
        $html = 'Jurusan tidak bisa dihapus karena masih memiliki siswa : ';
        $html .= '<ul>';
            foreach ($kelas->datasiswa as $book)
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