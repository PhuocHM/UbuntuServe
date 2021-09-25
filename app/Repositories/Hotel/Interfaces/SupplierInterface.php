<?php

namespace App\Repositories\Hotel\Interfaces;

interface SupplierInterface
{
    public function all();
    public function find($id);
    public function findSupplierProduct($id);
    public function findProduct($id);
    public function store($request);
    public function update($request, $id);
    public function delete($id);
}
