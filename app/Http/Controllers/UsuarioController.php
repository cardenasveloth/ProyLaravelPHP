<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    function __Construct()
    {
        $this->middleware('permission:var-rol|crear-rol|editar-rol|borrar-rol',['only'=>['index']]);
        $this->middleware('permission:crear-rol',['only'=>['create','store']]);
        $this->middleware('permission:editar-rol',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol',['only'=>['destroy']]);



    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=user::all();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::pluck('name', 'name')->all();
        return view('usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:confirm-password',
            'roles'=>'required']);
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        $roles=Role::pluck('name', 'name')->all();
        $userRole=$user->roles->pluck('name','name')->all();
        return view('usuarios.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);
        
        $input=$request->all();
        if(!empty($input['password']))
        {
            $input['password']= Hash::make($input['password']);
        }else{
            $input= Arr::except($input, array('password'));
        }
        $user=User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}