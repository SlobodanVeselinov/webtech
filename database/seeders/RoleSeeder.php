<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'Administrator'],
            ['id' => 2, 'name' => 'Author'],
        ];

        Role::insert($roles);
    }
}
