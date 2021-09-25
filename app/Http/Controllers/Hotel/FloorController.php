<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FloorRequest;
use App\Repositories\Hotel\Eloquents\FloorRepository;


class FloorController extends Controller
{
    private $floorRepository;
    public function __construct(FloorRepository $floorRepository)
    {
        $this->floorRepository = $floorRepository;
    }
    public function store(FloorRequest $request)
    {
        $this->floorRepository->store($request);
        return response()->json(['success' => 'Đã thêm tầng ' . $request->floor_name . ' vào danh sách.']);
    }

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
        //
    }
}
