<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Category;

class LatestPostProvider extends ServiceProvider
{

    public $posts;
    public $latest_posts;
    public $categories;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->latest_posts = Post::orderBy('id', 'desc')->take(10)->get();
        $this->posts = Post::all();
        $this->categories = Category::orderBy('order_number', 'asc')->get();

        view()->composer('layouts.front', function($view) {
            $view->with(['latest_posts' => $this->latest_posts, 
                         'categories' => $this->categories,
                         'posts' => $this->posts
                        ]);
        });
    }
}
