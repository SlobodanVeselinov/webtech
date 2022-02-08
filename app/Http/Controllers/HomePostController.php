<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\category;

class HomePostController extends Controller
{
    


    public function index(){

        $posts = Post::where('is_approved', 1)->orderBy('id', 'desc')->paginate(5);
        return view('home.welcome', compact('posts'));

    }


 


    public function view_post($id){

        $post = Post::findOrFail($id);

        return view('home.view-post', compact('post'));
    }



    public function view_category($id){

        $posts = Post::where('category_id', $id)->where('is_approved', 1)->orderBy('id', 'desc')->paginate(5);


        //return($posts);

        return view('home.category-view', compact('posts'));

    }



}
