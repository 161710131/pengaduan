<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use Session;
use Hash;
use App\Role;
use App\Datasiswa;
use App\Kelas;
use App\Jurusan;
use File;
use Auth;
class DatasiswaController extends Controller
{
    use RegistersUsers;


    public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    {
        // menampilkan semua data datasiswa melalui model 'datasiswa'
        $datasiswa = datasiswa::with('kelas','jurusan')->get();
        return view('datasiswa.index', compact('datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = kelas::all();
        $jurusan = jurusan::all();
        return view('datasiswa.create', compact('kelas','jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'nis'=>'required|unique:datasiswas',
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'tempat_lahir'=>'required',
        'tgl_lahir'=>'required',
        'jenis_kelamin'=>'required',
        'gambar'=>'required',
        'id_kelas'=>'required',
        'id_jurusan'=>'required']);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);


        $datasiswa = new datasiswa;
        $datasiswa->nis = $request->nis;
        $datasiswa->id_user = $user->id;
        $datasiswa->tempat_lahir = $request->tempat_lahir;
        $datasiswa->tgl_lahir = $request->tgl_lahir;
        $datasiswa->jenis_kelamin = $request->jenis_kelamin;
        $datasiswa->gambar = $request->gambar;
        // foto
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/backend/assets/images/fotosiswa/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $datasiswa->gambar = $filename;
            }
        $datasiswa->id_kelas = $request->id_kelas;
        $datasiswa->id_jurusan = $request->id_jurusan;
        
        $datasiswa->save();
        return redirect()->route('datasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // memanggil data berdasrkan id di halaman edit
        $datasiswa = datasiswa::findOrFail($id);
        $kelas = kelas::all();
        $selectedkelas = datasiswa::findOrFail($id)->id_kelas;
        $jurusan = jurusan::all();
        $selectedjurusan = datasiswa::findOrFail($id)->id_jurusan;
        return view('datasiswa.edit',compact('datasiswa','kelas','selectedkelas','jurusan','selectedjurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // unique dihapus karena ketika update data title tidak diubah juga tidak apa-apa
        $this->validate($request,[
        'nis'=>'required|unique:datasiswas',
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'tempat_lahir'=>'required',
        'tgl_lahir'=>'required',
        'jenis_kelamin'=>'required',
        'gambar'=>'required',
        'id_kelas'=>'required',
        'id_jurusan'=>'required']);

        // update data berdasarkan id
        $datasiswa = datasiswa::findOrFail($id);
        $datasiswa->nis = $request->nis;
        $datasiswa->id_user = $user->id;
        $datasiswa->tempat_lahir = $request->tempat_lahir;
        $datasiswa->tgl_lahir = $request->tgl_lahir;
        $datasiswa->jenis_kelamin = $request->jenis_kelamin;
        // edit upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/backend/assets/images/fotosiswa/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
    
        // hapus gambar lama, jika ada
        if ($datasiswa->gambar) {
        $old_gambar = $datasiswa->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/backend/assets/images/fotosiswa'
        . DIRECTORY_SEPARATOR . $datasiswa->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $datasiswa->gambar = $filename;
}
        $datasiswa->id_kelas = $request->id_kelas;
        $datasiswa->id_jurusan = $request->id_jurusan;
        
        $datasiswa->save();
        return redirect()->route('datasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datasiswa = datasiswa::findOrFail($id);
        if ($datasiswa->gambar) {
            $old_foto = $datasiswa->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'backend/assets/images/fotosiswa/'
            . DIRECTORY_SEPARATOR . $datasiswa->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        $datasiswa->delete();
        return redirect()->route('datasiswa.index');
    }
}
