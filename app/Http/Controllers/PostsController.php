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

        $categories = Category::all();

        return view('dashboard.create-post', compact('categories'));
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

        return redirect('dashboard')->with('success', 'You have created a new post. The post is waiting to be approved by the adminitrator!');
    }

    public function view_all(){
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('dashboard.all-posts', compact('posts'));
    }


    public function show_post($id){
        $post = Post::find($id);
        return view('dashboard.show-post', compact('post'));
    }


    public function delete_post($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/dashboard');
       
    }


    public function edit_post($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('dashboard.edit-post', compact('post','categories'));
    }

    public function update_post(Request $request, $id){
        $post = Post::find($id);

        if($request->image){

            if($post->image){
                unlink('images/posts/'.$post->image);
            }

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


    
    public function approve_index(){

        $posts = Post::where('is_approved', 0)->get();

        
        return view('dashboard.post-approval', compact('posts'));
    }


    public function post_approve($id){
        $post = Post::findOrFail($id);
        $post->is_approved = 1;
        $post->save();
        return redirect('/post/approval');
    }



}
