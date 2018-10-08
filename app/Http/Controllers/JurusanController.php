<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use Session;

class JurusanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan semua data post melalui model 'post'
        $m = jurusan::all();
        return view('jurusan.index',compact('m'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nama_jurussan'=>'required|max:35']);
        $m = new jurusan;
        $m->nama_jurussan = $request->nama_jurussan;
        $m->save();
    
        return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $m = jurusan::findOrFail($id);
        return view('jurusan.show',compact('m'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // memanggil data pos berdasrkan id di halaman pos edit
        $m = jurusan::findOrFail($id);
        return view('jurusan.edit',compact('m'));
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
            'nama_jurussan'=>'required',
            ]);

        // update data berdasarkan id
        $m = jurusan::findOrFail($id);
        $m->nama_jurussan = $request->nama_jurussan;
        $m->save();
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(!Jurusan::destroy($id)) return redirect()->back();
       Session::flash("flash_notification", [
       "level"=>"sucsess",
       "message"=>"jurusan barhasil dihapus"]);
       
        return redirect()->route('jurusan.index');
    }
}
