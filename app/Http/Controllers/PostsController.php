<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Auth;

class PostsController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $user_role = $user->roles;
        $categories = Category::all();

        return view('dashboard.create-post', compact('user_role', 'categories'));
    }


    public function store(Request $request){

        $post = new Post();

        $this->validate($request, [
            'title'   =>'required',
            'body' =>'required',
            'image' =>'mimes:jpg,png,jpeg'
        ]);

        if($request->image){
            $newImageName = time(). '.' .$request->image->extension(); 

            $request->image->move(public_path('images/posts'), $newImageName);
            $post->image = $newImageName;
        }

        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect('dashboard')->with('success', 'You have created a new post!');
    }

    public function view_all(){
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        $user = User::find(Auth::user()->id);
        $user_role = $user->roles;

        return view('dashboard.all-posts', compact('posts', 'user_role'));
    }


    public function show_post($id){
        $post = Post::find($id);
        $user = User::find(Auth::user()->id);
        $user_role = $user->roles;
        return view('dashboard.show-post', compact('post', 'user_role'));
    }


    public function delete_post($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/dashboard');
       
    }


    public function edit_post($id){
        $post = Post::find($id);
        $user = User::find(Auth::user()->id);
        $user_role = $user->roles;
        $categories = Category::all();
        return view('dashboard.edit-post', compact('post', 'user_role', 'categories'));
    }

    public function update_post(Request $request, $id){
        $post = Post::find($id);

        if($request->image){
            $newImageName = time() . '.' . $request->image->extension(); 

            $request->image->move(public_path('images/posts'), $newImageName);
            $post->image = $newImageName;
        }
       
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        session()->flash('post-updated', 'Post has been updated.');
        return redirect('/post/' .$post->id);
    }


}
