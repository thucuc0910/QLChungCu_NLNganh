<?php

namespace App\Http\Controllers\admin;

use App\Http\Services\admin\DepartmentService;
use App\Http\Services\admin\ServiceService;
use App\Http\Services\admin\DepartmentServiceService;
use App\Http\Requests\admin\DepartmentServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentServiceController extends Controller
{
    protected $departmentService;
    protected $departmentserviceService;

    protected $serviceService;

    public function __construct(DepartmentService $departmentService,DepartmentServiceService $departmentserviceService, ServiceService $serviceService)
    {
        $this->departmentService = $departmentService;
        $this->departmentserviceService = $departmentserviceService;
        $this->serviceService = $serviceService;
    }
    public function add_service(){
        return view('admin.service.add_DepartmentService',[
            'title' => "THÊM DỊCH VỤ CHO CĂN HỘ",
            'services' => $this->serviceService->get(),
            'departments' => $this->departmentService->get(),
        ]);
    }

    public function add_service_update(DepartmentServiceRequest $request){
        //dd($request->input());
        $this->departmentserviceService->createDepartmentService($request);

        return redirect()->back();
    }
}
