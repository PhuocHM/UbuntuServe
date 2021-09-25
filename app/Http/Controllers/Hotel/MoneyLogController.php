<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Hotel\Eloquents\MoneyLogRepository;
use App\Repositories\Hotel\Eloquents\StorageRepository;

class MoneyLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moneyLogRepository;
    private $storageRepository;
    public function __construct(MoneyLogRepository $moneyLogRepository, StorageRepository $storageRepository)
    {
        $this->moneyLogRepository = $moneyLogRepository;
        $this->storageRepository = $storageRepository;
    }
    public function index()
    {
        $log = $this->moneyLogRepository->all();
        $storage = $this->storageRepository->all();
        $params = [
            "log" => $log,
            "storage" => $storage,
        ];
        return view('Hotel.Money.budget', $params);
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
    public function store(Request $request)
    {
        $this->moneyLogRepository->store($request);
        $popup = 'Đã thêm thành công !';
        return redirect()->route('money-log.index')->with('success', $popup);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = $this->moneyLogRepository->find($id);
        return response()->json(['success' => $log]);
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
        $this->moneyLogRepository->update($request, $id);
        $popup = "Đã chỉnh sửa thành công thành công";
        return redirect()->route('money-log.index')->with('success', $popup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->moneyLogRepository->delete($id);
        $popup = "Đã xóa thành công";
        return redirect()->route('money-log.index')->with('success', $popup);
    }
}
