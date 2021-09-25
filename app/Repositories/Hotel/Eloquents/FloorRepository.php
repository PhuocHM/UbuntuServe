<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\FloorInterface;
use App\Models\Hotel\Floor;

class FloorRepository implements FloorInterface
{
    public function all()
    {
        $items = Floor::all();
        return $items;
    }
    public function find($id)
    {
        $item = Floor::find($id);
        return $item;
    }
    public function store($request)
    {
        $room_type = new Floor;
        $room_type->floor_name = $request->floor_name;
        $room_type->save();
        return $room_type;
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
