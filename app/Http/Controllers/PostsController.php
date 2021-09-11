<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.list', ['posts' => $posts]);
    }

    public function show(Request $request, $id)
    {
        $post = Post::find($id);
        return view('posts.show', [
            'id' => $post->id,
            'title' => $post->title, 
            'body' => $post->body
        ]);
    }

    public function create(Request $request, $id = null)
    {
        $post = Post::find($id);
        return view('posts.create', [
            'id' => $post ? $post->id : '',
            'title' => $post ? $post->title : '',
            'body' => $post ? $post->body : ''
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect(route('post.all'));
    }

    public function edit(Request $request, $id)
    {
        Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);
        return redirect(route('post.all'));
    }

    public function destroy(Request $request, $id) {
        Post::where('id', $id)->delete();
        return redirect(route('post.all'));
    }
}
