<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Hotel\Eloquents\RoomRepository;
use App\Repositories\Hotel\Eloquents\FloorRepository;
use App\Repositories\Hotel\Eloquents\TypeRepository;
use App\Repositories\Hotel\Eloquents\EmployeesRepository;
use App\Repositories\Hotel\Eloquents\StorageRepository;
use App\Repositories\Hotel\Eloquents\ProductRepository;
use App\Repositories\Hotel\Eloquents\BookingRepository;
use App\Repositories\Hotel\Eloquents\CustomerRepository;
use App\Http\Requests\RoomRequest;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{

    private $roomRepository;
    private $floorRepository;
    private $typeRepository;
    private $employeesRepository;
    private $storageRepository;
    private $productRepository;
    private $bookingRepository;
    private $customerRepository;
    public function __construct(RoomRepository $roomRepository, FloorRepository $floorRepository, TypeRepository $typeRepository, EmployeesRepository $employeesRepository, StorageRepository $storageRepository, ProductRepository $productRepository, BookingRepository $bookingRepository, CustomerRepository $customerRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->floorRepository = $floorRepository;
        $this->typeRepository = $typeRepository;
        $this->employeesRepository = $employeesRepository;
        $this->storageRepository = $storageRepository;
        $this->productRepository = $productRepository;
        $this->bookingRepository = $bookingRepository;
        $this->customerRepository = $customerRepository;
    }
    public function index()
    {

        $this->authorize('manage_room', 'manage_room');

        $floor = $this->floorRepository->all();
        $type = $this->typeRepository->all();
        $employee =  $this->employeesRepository->allEmployee();
        $storage = $this->storageRepository->all();
        $products = $this->productRepository->all();
        $booking = $this->bookingRepository->bookingPaginate('created_at', 'desc', 2);
        $customers = $this->customerRepository->customerPaginate('created_at', 'asc', 5);
        $rooms = $this->roomRepository->orderByRoom('room_name', 'asc');
        $room_active = $this->roomRepository->roomType(1);
        $room_used = $this->roomRepository->roomType(2);
        $groups = $this->roomRepository->groupRoom($rooms);
        $floor_arr = $floor->pluck('floor_name', 'id')->toArray();
        $floor = $floor->pluck('id', 'floor_name');
        $type = $type->pluck('id', 'type_name');
        return $this->roomRepository->indexIntoView($floor, $type, $groups, $customers, $floor_arr, $room_active, $room_used, $booking, $storage, $employee, $products);
    }
    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $customers = $this->customerRepository->customerPaginate('created_at', 'asc', 5);
            return view('include.pagination_customer', compact('customers'))->render();
        }
    }
    function paginateBooking(Request $request)
    {
        if ($request->ajax()) {
            $booking = $this->bookingRepository->bookingPaginate('created_at', 'desc', 2);
            return view('include.pagination_booking', compact('booking'))->render();
        }
    }

    public function store(RoomRequest $request)
    {
        $this->roomRepository->store($request);
        return response()->json(['success' => 'Đã thêm tầng ' . $request->room_name . '  vào danh sách']);
    }

    public function edit($id)
    {
        $room = $this->roomRepository->find($id);
        $floor =  $this->floorRepository->all();
        $type =  $this->typeRepository->all();
        return $this->roomRepository->editIntoView($room, $floor, $type);
    }
    public function show($id)
    {
        $log = $this->roomRepository->findPrice($id);
        return response()->json(['success' => $log]);
    }
    public function update(Request $request, $id)
    {
        $this->roomRepository->update($request, $id);
        $popup = "Đã cập nhật phòng " . $request->room_name . ' thành công !';
        return redirect()->route('room.index')->with('update-room-success', $popup);
    }

    public function destroy($id)
    {
        $room = $this->roomRepository->find($id);
        $bookingOf = $this->bookingRepository->findWith('room_id', $id);
        if (count($bookingOf) > 0) {
            $popup = "Phòng " . $room->room_name . " đang có người đặt, không thể xóa !";
            return redirect()->route('room.index')->with('delete-room-success', $popup);
        }
        $popup = "Đã xóa phòng " . $room->room_name . ' thành công !';
        $this->roomRepository->delete($id);
        return redirect()->route('room.index')->with('delete-room-success', $popup);
    }
}
