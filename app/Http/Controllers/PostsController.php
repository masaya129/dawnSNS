<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        $post = \DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->get();
        $user = auth()->user();
        return view('posts.index',['post'=>$post]);
    }

    public function store(Request $request){
        $post = $request->input('newPost');
        $user_id = \Auth::user()->id;
        \DB::table('posts')
        ->insert([
            'user_id' => $user_id,
            'post' => $post
        ]);
        $post->save();
 
        return redirect('/posts.index')->with($post);
    }
}
