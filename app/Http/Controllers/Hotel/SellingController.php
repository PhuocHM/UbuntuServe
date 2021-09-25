<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel\SellingDetail;
use App\Repositories\Hotel\Eloquents\SellingRepository;
use App\Http\Requests\SellingRequest;

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $sellingRepository;
    public function __construct(SellingRepository $sellingRepository)
    {
        $this->sellingRepository = $sellingRepository;
    }
    public function index()
    {
        $log = $this->sellingRepository->all();
        $params = [
            "log" => $log,
        ];
        return view('Hotel.Money.roombill', $params);
    }
    public function store(SellingRequest $request)
    {
        $selling = $this->sellingRepository->store($request);
        $product_ids     = $request->product_id;
        $qtys             = $request->qty;
        foreach ($product_ids as $key => $product_id) {
            $selling_detail = new SellingDetail;
            $selling_detail->order_id     = $selling->id;
            $selling_detail->product_id     = $product_id;
            $selling_detail->qty     = $qtys[$key];
            $selling_detail->save();
        }
        return response()->json(['success' => 'Đã thêm đơn bán lẻ thành công !']);
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
        $this->sellingRepository->delete($id);
        return redirect()->route('selling.index')->with('success', 'Đã xóa thành công !');
    }
}
