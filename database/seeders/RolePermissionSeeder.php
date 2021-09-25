<?php

namespace Database\Seeders;

use App\Models\Hotel\RolesPermission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 11;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 2;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 3;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 4;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 5;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 6;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 7;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 8;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 1;
        $role->role_permission = 9;
        $role->save();

        $role = new RolesPermission();
        $role->role_id = 3;
        $role->role_permission = 10;
        $role->save();
    }
}
