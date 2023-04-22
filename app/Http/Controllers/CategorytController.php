<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;
use Illuminate\Support\Facades\Auth;



class CategorytController extends Controller
{
    function __Construct()
    {
        $this->middleware('permission:ver-category|crear-category|editar-category|borrar-category',['only'=>['index']]);
        $this->middleware('permission:crear-category',['only'=>['create','store']]);
        $this->middleware('permission:editar-category',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-category',['only'=>['destroy']]);



    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.category.index', ['categorys'=>$categorys]);
     
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario = auth()->id();
        return view('dashboard.category.create', ['usuario'=>$usuario]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategory $request)
    {
        $request->validate([
           'name'=>'required|min:3|max:100',
            'description'=>'required|min:5|'
            
        ]);
        $category= new Category();
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->Autor_id=$request->input('autor');
        $category->save();
        return back()->with('status','Categoria creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        {
            return view('dashboard.category.show',['category'=>$category]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategory $request, $id)
    {
                
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:2|'
            ]);
            $category = Category::find($id);
            $category->name=$request->input('name');
            $category->description=$request->input('description');
            $category->save();
            return back()->with('status','Categoria actualizada  con exito'); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        if($category->Autor_id == Auth::id()) {
        $category->delete();
        return back()->with('status', "Categoria eliminada exitosamente");
        } else {
            return redirect()->back()->with('status', 'No tienes permiso para eliminar esta categoría.');
        }
    }
}
