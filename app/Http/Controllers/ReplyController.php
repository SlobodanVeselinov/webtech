<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reply;

class ReplyController extends Controller
{
    
    public function store(Request $request, $id){
        
         $this->validate($request, [
            'reply'   =>'required'
        ]);

        // $reply = Reply::create([
        //     'user_id' => Auth::user()->id, 
        //     'comment_id' => $id,
        //     'body'    => $request->reply
        // ]);

            $reply = new Reply;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $id;
            $reply->body = $request->reply;
            $reply->save();


        session()->flash('reply-created', 'Your reply was submited.');

        return back();

    }



}
