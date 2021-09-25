<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\SellingDetailInterface;
use App\Models\Hotel\SellingDetail;

class SellingDetailRepository implements SellingDetailInterface
{
    public function all()
    {
        $items = SellingDetail::all();
        return $items;
    }
    public function find($id)
    {
        $item = SellingDetail::find($id);
        return $item;
    }
    public function findById($id)
    {
        $items = SellingDetail::join('products', 'products.id', '=', 'selling_detail.product_id')->where('order_id', $id)->get();
        return $items;
    }
    public function store($request)
    {
        // ;
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
