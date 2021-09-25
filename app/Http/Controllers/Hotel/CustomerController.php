<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Hotel\Eloquents\CustomerRepository;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function store(CustomerRequest $request)
    {
        $request->all;
        $this->customerRepository->store($request);
        return response()->json(['success' => 'Đã thêm khách hàng ' . $request->customer_name . ' vào thành công.']);
    }
    public function seach(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'find_cmt'          => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $customer = $this->customerRepository->findByCmt($request->find_cmt);
        return response()->json(['success' => $customer]);
    }
    public function edit($id)
    {
        $customer = $this->customerRepository->find($id);
        $params = [
            'customer' => $customer
        ];
        return view('Hotel.RoomManage.editcustomer', $params);
    }
    public function update(CustomerRequest $request, $id)
    {
        $this->customerRepository->update($request, $id);
        $popup = 'Đã cập nhật thông tin cho ' . $request->customer_name . ' thành công !';
        return redirect()->route('room.index')->with('update-customer-success', $popup);
    }
    public function destroy($id)
    {
        $customer = $this->customerRepository->find($id)->customer_name;
        $popup = 'Đã xóa khách hàng ' . $customer . ' thành công !';
        $this->customerRepository->delete($id);
        return redirect()->route('room.index')->with('delete-customer-success', $popup);
    }
}
