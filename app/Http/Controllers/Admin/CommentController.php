<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment=Comment::with(['horoscope'])->get();
        return view('admin.comment.index',compact('comment'));
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
        //
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
        $comment=Comment::findorfail($id);
        return view('admin.comment.update',compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $comment=Comment::findorfail($request->id);
        $comment->update([
            'name'=>$request->name,
            'comment'=>$request->comment,
            'is_active'=>$request->is_active,
        ]);
        $notification=[
            'message'=>'Yorum Başarıyla Düzenlendi',
            'alert-type'=>'success'
        ];
        return redirect()->route('comment.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment=Comment::findorfail($id);
        $comment->delete();
        return redirect()->route('comment.index');
    }
}
