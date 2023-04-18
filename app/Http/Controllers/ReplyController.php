<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text'=>'required',
            'post_id'=>'required'
        ]);

        Reply::create($request->only('text', 'post_id'));
        return back()->with('status', 'Respuesta creada con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        //
        return view('dashboard.reply.edit', ["reply"=> $reply]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reply $reply)
    {
        $this->validate($request, ['text'=>'required', 'post_id'=>'required']);
        $reply->update($request->only('text', 'post_id'));
        return back()->with('status', 'Respuesta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();
        return back()->with('status', 'Publicación eliminada con éxito');
    }
}
