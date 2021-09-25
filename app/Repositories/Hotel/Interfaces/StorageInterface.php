<?php

namespace App\Repositories\Hotel\Interfaces;

interface StorageInterface
{
    public function all();
    public function find($id);
    public function store($request);
    public function update($request, $id);
    public function delete($id);
}
