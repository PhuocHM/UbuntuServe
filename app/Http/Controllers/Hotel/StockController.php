<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Hotel\Eloquents\StockRepository;
use App\Repositories\Hotel\Eloquents\StorageRepository;
use App\Repositories\Hotel\Eloquents\EmployeesRepository;
use App\Http\Requests\StockRequest;
use App\Models\Hotel\StockProduct;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $stockRepository;
    private $storageRepository;
    private $employeesRepository;
    public function __construct(StockRepository $stockRepository, StorageRepository $storageRepository, EmployeesRepository $employeesRepository)
    {
        $this->stockRepository = $stockRepository;
        $this->storageRepository = $storageRepository;
        $this->employeesRepository = $employeesRepository;
    }
    public function index()
    {
        $log = $this->stockRepository->getActive();
        $suppliers = $this->stockRepository->getAllSuppliers();
        $storage = $this->storageRepository->all();
        $employee = $this->employeesRepository->allEmployee();
        $params = [
            "log" => $log,
            "suppliers" => $suppliers,
            "storage" => $storage,
            "employee" => $employee,
        ];
        return view('Hotel.Stock.Receiving.receivingbill', $params);
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
    public function store(StockRequest $request)
    {
        $stock = $this->stockRepository->store($request);
        $product_ids     = $request->product_id;
        $qtys             = $request->qty;
        foreach ($product_ids as $key => $product_id) {
            $stock_product = new StockProduct;
            $stock_product->stock_id     = $stock->id;
            $stock_product->product_id     = $product_id;
            $stock_product->qty     = $qtys[$key];
            $stock_product->save();
        }
        return response()->json(['success' => "Đã thêm phiếu nhập hàng thành công !"]);
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
        $this->stockRepository->delete($id);
        return redirect()->route('stock.index')->with('success', 'Đã xóa thành công !');
    }
}
