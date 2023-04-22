<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Http\Requests\StoreReply;
use Illuminate\Support\Facades\Auth;




class ReplyController extends Controller
{
    function __Construct()
    {
        $this->middleware('permission:ver-reply|crear-reply|editar-reply|borrar-reply',['only'=>['index']]);
        $this->middleware('permission:crear-reply',['only'=>['create','store']]);
        $this->middleware('permission:editar-reply',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-reply',['only'=>['destroy']]);



    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $replys = Reply::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.reply.index', ['replys'=>$replys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post=Post::all();
        $usuario = auth()->id();
        
        return view('dashboard.reply.create',['usuario'=>$usuario,  'post'=>$post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReply $request)
    {
        $request->validate([
            
                'description'=>'required|min:2|'
            ]);
            $reply = new Reply();            
            $reply->post_id=$request->input('post');
            $reply->description=$request->input('description');
            
            $reply->save();
                return back()->with('status','Replica creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dashboard.reply.show',['reply'=>$reply]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reply=Reply::find($id);
        return view('dashboard.reply.edit', ["reply" => $reply, 'post'=>Post::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            
            'description'=>'required|min:2|'
            ]);
            $reply = Reply::find($id);
            
            $reply->description=$request->input('description');
            
            $reply->save();
            return back()->with('status','Comentario actualizado  con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reply=Reply::find($id);
        
            $reply->delete();
            
    }
}
