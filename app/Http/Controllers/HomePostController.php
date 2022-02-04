<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePostController extends Controller
{
    


    public function index(){
        return view('home.welcome');
    }




    
    public function view_post(){

        return view('home.view-post');
    }
}
