<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;

class RightSideContentProvider extends ServiceProvider
{

    public $posts;
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
        $this->posts = Post::all()->take(10);

        view()->composer('layouts.master', function($view){
            $view->with(['posts' => $this->posts]);
        });
    }
}
