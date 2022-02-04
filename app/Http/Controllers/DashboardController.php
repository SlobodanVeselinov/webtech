<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $user_role = $user->roles;
        
        $posts = Post::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(3);
        $posts_right = Post::latest()->get();
        return view('dashboard.dashboard', compact('posts', 'user_role', 'posts_right'));
    }
}
