<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Datasiswa;
use App\Pertanyaan;
class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pertanyaan = pertanyaan::with('datasiswa')->get();
        return view('pertanyaan.index',compact('pertanyaan'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datasiswa = datasiswa::all();
        
        return view('pertanyaan.create',compact('datasiswa'));
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
            'id_siswa' => 'required|',
            'pertanyaan' => 'required|'
            ]);
        $pertanyaan = new pertanyaan;
        $pertanyaan->id_siswa = $request->id_siswa;
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();
        
        ;
        return redirect()->route('pertanyaan.index');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\DataPertanyaan  $dataPertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(DataPertanyaan $dataPertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataPertanyaan  $dataPertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = pertanyaan::findOrFail($id);
        $datasiswa = datasiswa::all();
        $selecteddatasiswa = pertanyaan::findOrFail($id)->id_siswa;
        return view('pertanyaan.edit',compact('pertanyaan','datasiswa','selecteddatasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataPertanyaan  $dataPertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'id_siswa' => 'required|',
            'pertanyaan' => 'required|'
                    ]);
        $pertanyaan = pertanyaan::findOrFail($id);
        $pertanyaan->id_siswa = $request->id_siswa;
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();
        return redirect()->route('pertanyaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataPertanyaan  $dataPertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = pertanyaan::findOrFail($id);
        $pertanyaan->delete();
       
        return redirect()->route('pertanyaan.index');
    }
}
