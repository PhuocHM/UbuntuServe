<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\EmployeesInterface;
use App\Models\User;

class EmployeesRepository implements EmployeesInterface
{
    public function all()
    {
        $items = User::join('roles', 'roles.id', '=', 'users.role')->get();
        return $items;
    }
    public function allEmployee()
    {
        $items = User::all();
        return $items;
    }
    public function find($id)
    {
        $item = User::find($id);
        return $item;
    }
    public function store($request)
    {
        $user = new User;
        $user->name = $request->add_employee_name;
        $user->email = $request->add_employee_email;
        $user->password = bcrypt($request->add_employee_password);
        $user->role = $request->add_roles_id;
        $user->save();
        return $user;
    }
    public function seach($content)
    {
        $employee_list = User::where('name', $content)->orWhere('email', $content)->get();
        return $employee_list;
    }
    public function show($role_id)
    {
        $item = User::join('roles', 'roles.id', '=', 'users.role')->where('role', $role_id)->get();
        return $item;
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
