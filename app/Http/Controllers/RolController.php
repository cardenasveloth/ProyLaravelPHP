<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
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
        $roles=Role::all();
        return view('roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission=Permission::all()->pluck(value:'name',key:'id');
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required','permission'=>'required']);
        $role= Role::create($request->only('name'));
        $role->syncPermissions($request->input('permission',[]));
        return redirect()->route('roles.index');
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
    public function edit(Role $role)
    {
        $role ->load('permissions');
        $permission=Permission::all()->pluck(value:'name',key:'id');
        return view('roles.edit', compact('role', 'permission'));

        
        //metodo pluck, recupera todos los valores de una clave determinada, $id
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request,['name'=>'required','permission'=>'required']);
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permission',[]));       
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol=Role::find($id);
        DB::table('roles')->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
