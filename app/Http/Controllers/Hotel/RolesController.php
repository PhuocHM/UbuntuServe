<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Hotel\Eloquents\EmployeesRepository;
use App\Repositories\Hotel\Eloquents\RoleRepository;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $employeesRepository;
    private $roleRepository;
    public function __construct(EmployeesRepository $employeesRepository, RoleRepository $roleRepository)
    {
        $this->employeesRepository = $employeesRepository;
        $this->roleRepository = $roleRepository;
    }
    public function index()
    {
        $employee_list = $this->employeesRepository->all();
        $role_list = $this->roleRepository->all();
        $params = [
            "employee_list" => $employee_list,
            "role_list" => $role_list,
        ];
        return view('Hotel.Role.index', $params);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seachRole($id)
    {
        $employee_list =  $this->employeesRepository->show($id);
        return view('include.employee_list', compact('employee_list'))->render();
    }
    public function seach($content)
    {
        $employee_list =  $this->employeesRepository->seach($content);
        return view('include.employee_list', compact('employee_list'))->render();
    }
    public function show($id)
    {
        // $role_list =  $this->employeesRepository->show($id);
        // return response()->json(['success' => $role_list]);
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
        //
    }
}
