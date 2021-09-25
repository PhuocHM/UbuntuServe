<?php

namespace App\Repositories\Hotel\Interfaces;

interface BookingInterface
{
    public function all();
    public function find($id);
    public function store($request);
    public function update($request, $id);
    public function delete($id);
    public function findWith($col, $room_id);
    public function bookingPaginate($col, $type, $number);
}
