<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Administartor',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('administrator'), // password
            'remember_token' => Str::random(10),
        ];

        User::insert($admin);
    }
}
