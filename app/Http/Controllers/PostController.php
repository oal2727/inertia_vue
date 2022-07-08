<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(){
        return Inertia::render('Post/index', [
            'posts' => Post::all(),
        ]);
    }
    public function create(){
        return Inertia::render('Post/create', [
            'event' => 'qwe',
        ]);
    }

    public function store(Request $request)
    { 
        Post::updateOrCreate([
        'id' => $request->id,
        ],$request->all());
        return Redirect::route('index');
    }
    public function edit($id){
        $post = Post::findOrFail($id);
        return Inertia::render('Post/create', [
            'post' => $post,
        ]);
    }
    public function destroy($id)
    {   
        $post = Post::findOrFail($id);
        $post->delete();
        return Redirect::route('index');
    }
}
