<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    

    public function index(){
       
        $categories = Category::orderBy('order_number', 'asc')->get();

        return view('dashboard.categories.index', compact('categories'));
    }



    public function create(Request $request){

        $category = new Category();

        $this->validate($request, [
            'name'   =>'required|min:2',
        ]);

        $category->name = $request->name;

        $category->save();

        session()->flash('category-created', 'Category '. $category->name . 'created successfully');
        return back();

    }




}
