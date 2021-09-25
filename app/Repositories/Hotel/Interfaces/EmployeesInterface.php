<?php

namespace App\Repositories\Hotel\Interfaces;

interface EmployeesInterface
{
    public function all();
    public function allEmployee();
    public function find($id);
    public function store($request);
    public function show($role_id);
    public function seach($content);
    public function update($request, $id);
    public function delete($id);
}
