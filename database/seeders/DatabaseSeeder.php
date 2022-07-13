<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Category;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();
        Category::factory(6)->create();
        Post::factory(500)->create();
        RoleUser::factory(4)->create();
        Comment::factory(300)->create();
        Reply::factory(100)->create();


        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            AdminRoleSeeder::class,
        ]);
    }
}
