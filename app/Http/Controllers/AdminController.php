<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function get_users(){
        $users = User::all();

        return view('dashboard.users', compact('users'));
    }


    public function show_user($id){
        $selected_user = User::find($id);

        return view('dashboard.users-info', compact('selected_user'));
    }


    public function edit_user($id){
        $selected_user = User::find($id);
        $roles = Role::all();

        // $user = User::find(Auth::user()->id);

        return view('dashboard.user-edit', compact('selected_user', 'roles'));
        
    }

    public function update_user(Request $request, $id){

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $role = $request->role;
        $user->save();
        $user->roles()->sync($role);
        $posts = Post::latest()->get();

        //return redirect('/dashboard');
        return redirect()->route('users.get');

    }


    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }


    public function profile_view($id){

        $user = User::find($id);
        
        return view('dashboard.user-profile', compact('user'));
    }


    public function profile_edit($id){
        $user = User::find($id);
        $roles = Role::all();

        return view('dashboard.edit-profile', compact('user', 'roles'));
    }


        public function update_profile(Request $request, $id){

        $user = User::find($id);
        
        $this->validate($request, [
            'name'   =>'required',
            'email' =>'required|email',
            'image' =>'mimes:jpg,png,jpeg'
        ]);


        if($request->image){
            $newImageName = time() . '-' . $user->id . '.' . $request->image->extension(); 

            $request->image->move(public_path('images'), $newImageName);
            $user->image = $newImageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        
        //$role = $request->role;
        $user->save();
        //$user->roles()->sync($role);

        return redirect('/dashboard');

    }

}
