<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Roles();
        $role->id = 1;
        $role->role_name = "Director";
        $role->save();

        $role = new Roles();
        $role->id = 2;
        $role->role_name = "Manager";
        $role->save();

        $role = new Roles();
        $role->id = 3;
        $role->role_name = "User";
        $role->save();
    }
}
