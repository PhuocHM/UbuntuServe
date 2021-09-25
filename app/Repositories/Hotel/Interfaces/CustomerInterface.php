<?php

namespace App\Repositories\Hotel\Interfaces;

interface CustomerInterface
{
    public function all();
    public function find($id);
    public function findByCmt($cmt);
    public function store($request);
    public function update($request, $id);
    public function delete($id);
    public function customerPaginate($col, $type, $number);
}
