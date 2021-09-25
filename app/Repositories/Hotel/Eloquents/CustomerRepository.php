<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\CustomerInterface;
use App\Models\Hotel\Customers;

class CustomerRepository implements CustomerInterface
{
    public function all()
    {
        $items = Customers::all();
        return $items;
    }
    public function find($id)
    {
        $item = Customers::find($id);
        return $item;
    }
    public function findByCmt($cmt)
    {
        $customer = Customers::where('customer_cmt', $cmt)->get();
        $customer->pluck('id', 'customer_name', 'customer_dob', 'customer_phone', 'customer_address', 'customer_cmt')->toArray();
        return $customer;
    }
    public function store($request)
    {
        $customer = new Customers;
        $customer->customer_name = $request->customer_name;
        $customer->customer_dob = $request->customer_dob;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->customer_address_info = $request->customer_address_info;
        $customer->customer_gender = $request->customer_gender;
        $customer->customer_cmt = $request->customer_cmt;
        $customer->save();
        return $customer;
    }
    public function update($request, $id)
    {
        $customer = Customers::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_dob = $request->customer_dob;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->customer_address_info = $request->customer_address_info;
        $customer->customer_gender = $request->customer_gender;
        $customer->customer_cmt = $request->update_customer_cmt;
        $customer->save();
        return $customer;
    }
    public function delete($id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return $customer;
    }
    public function customerPaginate($col, $type, $number)
    {
        $booking = Customers::orderBy($col, $type)->paginate($number);
        return $booking;
    }
}
// <?php

// namespace App\Repositories\Hotel\Eloquents;

// use App\Repositories\Hotel\Interfaces\CustomerInterface;
// use App\Models\Hotel\Customers;

// class CustomerRepository implements CustomerInterface
// {
//     public function all()
//     {
//         $items = Customers::all();
//         return $items;
//     }
//     public function find($id)
//     {
//         $item = Customers::find($id);
//         return $item;
//     }
//     public function store($request)
//     {
//         // 
//     }
//     public function seach($request)
//     {
//         // 
//     }
//     public function update($request, $id)
//     {
//         // 
//     }
//     public function delete($id)
//     {
//         // 
//     }
// }
