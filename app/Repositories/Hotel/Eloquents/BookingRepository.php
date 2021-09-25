<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\BookingInterface;
use App\Models\Hotel\Booking;

class BookingRepository implements BookingInterface
{
    public function all()
    {
        $items = Booking::all();
        return $items;
    }
    public function find($id)
    {
        $item = Booking::find($id);
        return $item;
    }
    public function store($request)
    {
        $booking = new Booking;
        $booking->customer_id = $request->customer_id;
        $booking->checkin_time = $request->booking_time;
        $booking->checkin_amount = $request->booking_money;
        $booking->note = $request->booking_note;
        $booking->room_id = $request->booking_room;
        $booking->save();
        return $booking;
    }
    public function update($request, $id)
    {
        $booking = Booking::find($id);
        $booking->customer_id = $request->customer_id;
        $booking->checkin_time = $request->booking_time;
        $booking->checkin_amount = $request->booking_money;
        $booking->note = $request->booking_note;
        $booking->room_id = $request->booking_room;
        $booking->save();
        return $booking;
    }
    public function delete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return $booking;
    }
    public function findWith($col, $room_id)
    {
        $booking = Booking::where($col, $room_id)->get();
        return $booking;
    }
    public function bookingPaginate($col, $type, $number)
    {
        $booking = Booking::orderBy($col, $type)->paginate($number);
        return $booking;
    }
}
