<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\RoleInterface;
use App\Models\Hotel\Roles;

class RoleRepository implements RoleInterface
{
    public function all()
    {
        $items = Roles::all();
        return $items;
    }
    public function find($id)
    {
        $item = Roles::find($id);
        return $item;
    }
    public function store($request)
    {
        // 
    }
    public function update($request, $id)
    {
        // 
    }
    public function delete($id)
    {
        // 
    }
}
