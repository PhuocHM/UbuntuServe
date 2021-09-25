<?php

namespace App\Repositories\Hotel\Interfaces;

interface StockInterface
{
    public function all();
    public function find($id);
    public function getAllSuppliers();
    public function getActive();
    public function getStockProduct();
    public function store($request);
    public function update($request, $id);
    public function delete($id);
}
