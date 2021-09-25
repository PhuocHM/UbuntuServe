<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\SellingInterface;
use App\Models\Hotel\Selling;

class SellingRepository implements SellingInterface
{
    public function all()
    {
        $items = Selling::all();
        return $items;
    }
    public function find($id)
    {
        $item = Selling::find($id);
        return $item;
    }
    public function store($request)
    {
        // dd($request->all());
        $selling = new Selling;
        $selling->room_id     = $request->order_room;
        $selling->storage_id  = $request->storage_name;
        $selling->employee_id = $request->employee_name;
        $selling->type_sell = $request->type_sell;
        $selling->date_sell = $request->date_sell;
        $selling->note = $request->order_note;
        $selling->total_prices = $request->total_moneys;
        $selling->save();
        return $selling;
    }
    public function update($request, $id)
    {
        //    
    }
    public function delete($id)
    {
        $selling = Selling::find($id);
        $selling->active = 1;
        $selling->Save();
        return $selling;
    }
}
