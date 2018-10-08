<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pertanyaan;
use App\jawaban;

class JawabanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $jawaban = jawaban::with('pertanyaan')->get();
        return view('jawaban.index',compact('jawaban'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pertanyaan = pertanyaan::all();
        
        return view('jawaban.create',compact('pertanyaan'));
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
            'jawaban' => 'required|',
            'id_pertanyaan' => 'required|'
            ]);
        $jawaban = new jawaban;
        $jawaban->jawaban = $request->jawaban;
        $jawaban->id_pertanyaan = $request->id_pertanyaan;
        $jawaban->save();
        
        ;
        return redirect()->route('jawaban.index');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\jawaban  $jawaban
     *an @return \Illuminate\Http\Response
     */
    public function show(jawaban $jawaban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jawaban  $jawaban
     *an @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jawaban = jawaban::findOrFail($id);
        $pertanyaan = pertanyaan::all();
        $selectedpertanyaan = jawaban::findOrFail($id)->id_pertanyaan;
        return view('jawaban.edit',compact('jawaban','pertanyaan','selectedpertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jawaban  $jawaban
     *an @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'jawaban' => 'required|',
            'id_pertanyaan' => 'required|'
                    ]);
        $jawaban = jawaban::findOrFail($id);
        $jawaban->jawaban = $request->jawaban;
        $jawaban->id_pertanyaan = $request->id_pertanyaan;
        $jawaban->save();
        return redirect()->route('jawaban.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jawaban  $jawaban
     *an @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jawaban = jawaban::findOrFail($id);
        $jawaban->delete();
       
        return redirect()->route('jawaban.index');
    }
}
