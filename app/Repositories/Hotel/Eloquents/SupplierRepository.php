<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\SupplierInterface;
use App\Models\Hotel\Supplier;
use App\Models\Hotel\SupplierProduct;

class SupplierRepository implements SupplierInterface
{
    public function all()
    {
        $items = Supplier::all();
        return $items;
    }
    public function find($id)
    {
        $item = Supplier::find($id);
        return $item;
    }
    public function findSupplierProduct($id)
    {
        $product = SupplierProduct::where('supplier_id', '=', $id)->get();
        return $product;
    }
    public function findProduct($id)
    {
        $product = SupplierProduct::find($id);
        return $product;
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
