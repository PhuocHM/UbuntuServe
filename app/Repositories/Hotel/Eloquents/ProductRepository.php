<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\ProductInterface;
use App\Models\Hotel\Products;

class ProductRepository implements ProductInterface
{
    public function all()
    {
        $items = Products::all();
        return $items;
    }
    public function find($id)
    {
        $item = Products::find($id);
        return $item;
    }
    public function findActive()
    {
        $product = Products::where('active', '=', 0)->get();
        return $product;
    }
    public function store($request)
    {
        $product = new Products;
        $product->product_name = $request->product_names;
        $product->storage_id = $request->storage_id;
        $product->unit = $request->product_unit;
        $product->receive_price = $request->product_receive;
        $product->price = $request->product_price;
        $product->active = 0;
        $product->save();
        return $product;
    }
    public function update($request, $id)
    {
        $product = Products::find($id);
        $product->price = $request->edit_price;
        $product->save();
        return $product;
    }
    public function delete($id)
    {
        $product = Products::find($id);
        $product->active = 1;
        $product->Save();
        return $product;
    }
}
