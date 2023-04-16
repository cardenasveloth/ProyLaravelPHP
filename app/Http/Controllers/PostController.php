<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Http\Requests\StoreCategory;



class PostController extends Controller
{
    function __Construct()
    {
        $this->middleware('permission:ver-Post|crear-Post|editar-Post|borrar-Post',['only'=>['index']]);
        $this->middleware('permission:crear-Post',['only'=>['create','store']]);
        $this->middleware('permission:editar-Post',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-Post',['only'=>['destroy']]);



    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //$posts=Post::all();
       $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.post.index',['posts'=>$posts, 'category'=>Category::all()]);
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view('dashboard.post.create',['category'=>$category]);
    }

    public function store(StorePost $request)
    {   
        $request->validate([
        'name'=>'required|min:3|max:100',
            'description'=>'required|min:2|'
        ]);
        $post = new Post();
        $post->name=$request->input('name');
        $post->category_id=$request->input('category');
        $post->description=$request->input('description');
        $post->save();
            return back()->with('status','Publicación creada con exito');
    }

    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('dashboard.post.edit', ["post" => $post, 'category'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:2|'
            ]);
            $post = Post::find($id);
            $post->name=$request->input('name');
            $post->category_id=$request->input('category');
            $post->description=$request->input('description');
            
            $post->save();
            return back()->with('status','Publicación actualizada creada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return back()->with('status', "Post eliminado exitosamente");
    }

}
