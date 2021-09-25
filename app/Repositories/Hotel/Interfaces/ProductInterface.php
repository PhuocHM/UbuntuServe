<?php

namespace App\Repositories\Hotel\Interfaces;

interface ProductInterface
{
    public function all();
    public function find($id);
    public function findActive();
    public function store($request);
    public function update($request, $id);
    public function delete($id);
}
