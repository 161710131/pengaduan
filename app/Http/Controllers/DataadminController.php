<?php

namespace App\Http\Controllers;

use App\Dataadmin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use App\Role;
use App\User;
use Hash;
class DataadminController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dataadmin = dataadmin::all();
         return view('dataadmin.index',compact('dataadmin'));
        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dataadmin.create');
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
            'nipd' => 'required|unique:dataadmins|min:5',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);
            $adminRole = Role::where('name', 'admin')->first();
            $user->attachRole($adminRole);
        $dataadmin = new dataadmin;        
        $dataadmin->id_user = $user->id;
        $dataadmin->nipd = $request->nipd;
         $dataadmin->save();
        return redirect()->route('dataadmin.index');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\dataadmin  $dataadmin
     * @return \Illuminate\Http\Response
     */
    public function show(dataadmin $dataadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dataadmin  $dataadmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataadmin = dataadmin::findOrFail($id);
        return view('dataadmin.edit',compact('dataadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dataadmin  $dataadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nipd' => 'required|',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bycript($request['password'])
                ]);

        $dataadmin = dataadmin::findOrFail($id);
        $dataadmin->nipd = $request->nipd;
        $dataadmin->id_user->name = $request->id_user->name;
        $dataadmin->id_user->email = $request->id_user->email;
        $dataadmin->id_user->password = $request->id_user->password;
        $dataadmin->save();
        return redirect()->route('dataadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dataadmin  $dataadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $dataadmin = dataadmin::findOrFail($id);
        $dataadmin->delete();
        
        return redirect()->route('dataadmin.index');
    }
}