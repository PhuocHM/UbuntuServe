<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\StockInterface;
use App\Models\Hotel\Stock;
use App\Models\Hotel\StockProduct;
use App\Models\Hotel\Supplier;

class StockRepository implements StockInterface
{
    public function all()
    {
        $items = Stock::all();
        return $items;
    }
    public function find($id)
    {
        $item = Stock::find($id);
        return $item;
    }
    public function getAllSuppliers()
    {
        $items = Supplier::all();
        return $items;
    }
    public function getActive()
    {
        $items = Stock::where('active', '=', 0)->get();
        return $items;
    }
    public function getStockProduct()
    {
        $items = StockProduct::all();
        return $items;
    }
    public function store($request)
    {
        $stock = new Stock;
        $stock->supplier_id     = $request->supplier_id;
        $stock->storage_id  = $request->storage_id;
        $stock->date_receive = $request->date_receive;
        $stock->employee_id = $request->employee_name;
        $stock->type_receive = $request->type_receive;
        $stock->note = $request->order_note;
        $stock->active = 0;
        $stock->total_money = $request->total_moneys;
        $stock->save();
        return $stock;
    }
    public function update($request, $id)
    {
        // 
    }
    public function delete($id)
    {
        $stock = Stock::find($id);
        $stock->active = 1;
        $stock->Save();
        return $stock;
    }
}
