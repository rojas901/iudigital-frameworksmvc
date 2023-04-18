<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    function __Construct()
    {
        $this->middleware('permission:ver-post|crear-post|editar-post|borrar-post',['only'=>['index']]);
        $this->middleware('permission:crear-post',['only'=>['create','store']]);
        $this->middleware('permission:editar-post',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-post',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('dashboard.post.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('dashboard.post.create', ['post' => new Post()], ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //
        Post::create($request->validated());
        return back()->with('status', 'Publicación creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $replys = Reply::all();
        return view('dashboard.post.show', ["replys"=>$replys], ["post"=>$post], ['reply'=>new Reply()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.post.edit', ["post"=> $post], ['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePost $request, Post $post)
    {
        $post->update($request->validated());
        return back()->with('status', 'Publicación actualizada con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Publicación eliminada con éxito'); 
    }
}
