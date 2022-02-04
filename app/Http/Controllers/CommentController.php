<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    
    public function store(Request $request, Post $post){
        
         $this->validate($request, [
            'comment'   =>'required'
        ]);

        $comment = Comment::create([
            'user_id' => Auth::user()->id, 
            'post_id' => $post->id,
            'body'    => $request->comment
        ]);

        session()->flash('comment-created', 'Your comment was submited.');

        return back();

    }


}
