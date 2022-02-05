<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomePostController extends Controller
{
    


    public function index(){

        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('home.welcome', compact('posts'));

    }


 


    public function view_post($id){

        $post = Post::findOrFail($id);

        return view('home.view-post', compact('post'));
    }



}
