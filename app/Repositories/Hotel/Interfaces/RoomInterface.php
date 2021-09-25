<?php

namespace App\Repositories\Hotel\Interfaces;

interface RoomInterface
{
    public function all();
    public function find($id);
    public function store($request);
    public function update($request, $id);
    public function findPrice($id);
    public function roomType($type);
    public function orderByRoom($col, $type);
    public function updateFixRoom($id);
    public function updateReadyRoom($id);
    public function delete($id);
    public function editIntoView($room, $floor, $type);
    public function indexIntoView($floor, $type, $groups, $customers, $floor_arr, $room_active, $room_used, $booking, $storage, $employee, $products);
    public function groupRoom($rooms);
}
