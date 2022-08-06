<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    protected $user;
    protected $post;
    //
    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }


    //metodo para listar os posts e seu usuario
    public function list()
    {
        $posts = Post::all();
        return view('posts.list', compact('posts'));
    }

    //metodo para litas os posts de um determinado usuario
    public function show($id)
    {
        if(!$user = $this->user->find($id))
            return redirect()->back();

        $posts = $user->posts()->get();

        return view('posts.show', compact('user','posts'));
    }
}
