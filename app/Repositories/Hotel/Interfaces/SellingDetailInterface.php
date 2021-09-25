<?php

namespace App\Repositories\Hotel\Interfaces;

interface SellingDetailInterface
{
    public function all();
    public function find($id);
    public function findById($id);
    public function store($request);
    public function update($request, $id);
    public function delete($id);
}
