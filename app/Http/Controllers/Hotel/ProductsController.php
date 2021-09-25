<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Hotel\Eloquents\ProductRepository;
use App\Repositories\Hotel\Eloquents\SupplierRepository;
use App\Repositories\Hotel\Eloquents\StorageRepository;
use App\Repositories\Hotel\Eloquents\StockRepository;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $productRepository;
    private $supplierRepository;
    private $storageRepository;
    private $stockRepository;
    public function __construct(ProductRepository $productRepository, SupplierRepository $supplierRepository, StorageRepository $storageRepository, StockRepository $stockRepository)
    {
        $this->productRepository = $productRepository;
        $this->supplierRepository = $supplierRepository;
        $this->storageRepository = $storageRepository;
        $this->stockRepository = $stockRepository;
    }
    public function index()
    {
        $log = $this->productRepository->findActive();
        $stock_product = $this->stockRepository->getStockProduct();
        $storage = $this->storageRepository->all();
        $params = [
            "log" => $log,
            "stock_product" => $stock_product,
            "storage" => $storage,
        ];
        return view('Hotel.Category.product', $params);
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
    public function store(ProductRequest $request)
    {
        $this->productRepository->store($request);
        return response()->json(['success' => "Đã thêm sản phẩm thành công !"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  $this->productRepository->find($id);
        return response()->json(['success' => $product]);
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
        $this->productRepository->update($request, $id);
        return response()->json(['success' => 'Đã chỉnh sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index')->with('success', 'Đã xóa thành công !');
    }
}
