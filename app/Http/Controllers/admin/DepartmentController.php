<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Services\admin\DepartmentService;
use App\Http\Services\admin\ServiceService;
use App\Http\Requests\admin\DepartmentRequest;
use App\Models\Department;

use Symfony\Component\HttpFoundation\JsonResponse;


use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    protected $serviceService;

    public function __construct(DepartmentService $departmentService, ServiceService $serviceService)
    {
        $this->departmentService = $departmentService;
        $this->serviceService = $serviceService;
    }

    public function add()
    {
        return view('admin.department.add', [
            'title' => 'THÊM CĂN HỘ',
            // 'users' => $this->userService->getParent()
        ]);
    }

    public function create(DepartmentRequest $request)
    {
        //dd($request->input());
        $this->departmentService->create($request);

        return redirect()->back();
    }

    public function list()
    {
        return view('admin.department.list',[
            'title' => "DANH SÁCH CĂN HỘ",
            'departments' => $this->departmentService->get(),
        ]);
    }

    public function edit(Department $department)
    {
        return view('admin.department.edit', [
            'title' => 'CẬP NHẬT CĂN HỘ',
            'department' => $department,
        ]);
    }

    public function update(Department $department, DepartmentRequest $request )
    {
        $this->departmentService->update($request, $department);

        return redirect('/admin/department/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->departmentService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công tài khoản.'
            ]);
        }
        return response()->json([
            'error' => true  
        ]);
    }

    
}
