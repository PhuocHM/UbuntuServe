<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\TypeInterface;
use App\Models\Hotel\Type;

class TypeRepository implements TypeInterface
{
    public function all()
    {
        $items = Type::all();
        return $items;
    }
    public function find($id)
    {
        $item = Type::find($id);
        return $item;
    }
    public function store($request)
    {
        $room_type = new Type;
        $room_type->type_name = $request->room_type_name;
        $room_type->capacity = $request->room_type_capacity;
        $room_type->price = $request->room_type_price;
        $room_type->save();
        return $room_type;
    }
    public function update($request, $id)
    {
        $type = Type::find($id);
        $type->type_name = $request->room_type_name;
        $type->capacity = $request->room_type_capacity;
        $type->price = $request->room_type_price;
        $type->save();
        return $type;
    }
    public function delete($id)
    {
        $type = Type::find($id);
        $type->active = 1;;
        $type->save();
        return $type;
    }
}
