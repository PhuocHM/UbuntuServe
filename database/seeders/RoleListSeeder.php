<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel\RolesList;

class RoleListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //     'manage_money_add',
    // 'manage_money_edit',
    // 'manage_money_delete',
    // 'manage_products_delete',
    // 'manage_products_edit',
    // 'manage_products_add',
    // 'category_products_add',
    // 'category_products_edit',
    // 'category_products_delete',
    public function run()
    {
        $role_list = new RolesList();
        $role_list->id = 1;
        $role_list->role_name = "manage_money_add";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 2;
        $role_list->role_name = "manage_money_edit";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 3;
        $role_list->role_name = "manage_money_delete";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 4;
        $role_list->role_name = "manage_products_delete";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 5;
        $role_list->role_name = "manage_products_edit";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 6;
        $role_list->role_name = "manage_products_add";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 7;
        $role_list->role_name = "category_products_add";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 8;
        $role_list->role_name = "category_products_edit";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 9;
        $role_list->role_name = "category_products_delete";
        $role_list->save();

        $role_list = new RolesList();
        $role_list->id = 10;
        $role_list->role_name = "manage_room_index";
        $role_list->save();
    }
}
