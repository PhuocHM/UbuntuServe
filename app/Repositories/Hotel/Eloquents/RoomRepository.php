<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\RoomInterface;
use App\Models\Hotel\Room;

class RoomRepository implements RoomInterface
{
    public function all()
    {
        $items = Room::all();
        return $items;
    }
    public function find($id)
    {
        $item = Room::find($id);
        return $item;
    }
    public function findPrice($id)
    {
        $item = Room::find($id);
        return $item->type->price;
    }
    public function roomType($type)
    {
        $room = Room::where('status', '=', $type)->get();
        return $room;
    }
    public function orderByRoom($col, $type)
    {
        $rooms = Room::orderBy($col, $type)->get();
        return $rooms;
    }
    public function store($request)
    {
        $room = new Room;
        $room->room_name = $request->room_name;
        $room->room_type = $request->room_type;
        $room->floor = $request->room_floor;
        $room->note = $request->room_note;
        $room->save();
        return $room;
    }
    public function update($request, $id)
    {
        $room = Room::find($id);
        $room->room_name = $request->room_name;
        $room->room_type = $request->room_type;
        $room->floor = $request->room_floor;
        $room->note = $request->room_note;
        $room->save();
        return $room;
    }
    public function updateFixRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->status = 2;
        $room->save();
        return $room;
    }
    public function updateReadyRoom($id)
    {
        $room = Room::find($id);
        $room->status = 1;
        $room->save();
        return $room;
    }
    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $popup = "Đã xóa phòng " . $room->room_name . ' thành công !';
        $room->delete();
        return $room;
    }
    public function editIntoView($room, $floor, $type)
    {
        $params = [
            "room" => $room,
            "floor" => $floor,
            "type" => $type,
        ];
        return view('Hotel.RoomManage.editroom', $params);
    }
    public function indexIntoView($floor, $type, $groups, $customers, $floor_arr, $room_active, $room_used, $booking, $storage, $employee, $products)
    {
        $params = [
            "floor" => $floor,
            "type" => $type,
            "groups" => $groups,
            "customers" => $customers,
            "floor_arr" => $floor_arr,
            "room_active" => $room_active,
            "room_used" => $room_used,
            "booking" => $booking,
            "storage" => $storage,
            "employee" => $employee,
            "products" => $products,
        ];
        return view('Hotel.RoomManage.roommap', $params);
    }
    public function groupRoom($rooms)
    {
        $groups = [];
        foreach ($rooms as $room) {
            $groups[$room['floor']][] = $room;
        }
        return $groups;
    }
}
