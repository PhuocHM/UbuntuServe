<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Hotel\Eloquents\BookingRepository;
use App\Repositories\Hotel\Eloquents\RoomRepository;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $bookingRepository;
    private $roomRepository;
    public function __construct(BookingRepository $bookingRepository, RoomRepository $roomRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->roomRepository = $roomRepository;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $request->all();
        $this->bookingRepository->store($request);
        $this->roomRepository->updateFixRoom($request->booking_room);
        return response()->json(['success' => 'Đã đặt phòng ' . $request->booking_room . '  vào danh sách']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room_id = $this->bookingRepository->find($id)->room->id;
        $this->roomRepository->updateReadyRoom($room_id);
        $this->bookingRepository->delete($id);
        $popup = 'Đã xóa phòng đặt thành công !';
        return redirect()->route('room.index')->with('delete-customer-success', $popup);
    }
}
