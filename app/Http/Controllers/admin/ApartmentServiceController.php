<?php

namespace App\Http\Controllers\admin;

use App\Http\Services\admin\ApartmentService;
use App\Http\Services\admin\ServiceService;
use App\Http\Services\admin\ApartmentServiceService;
use App\Http\Requests\admin\ApartmentServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentServiceController extends Controller
{
    protected $apartmentService;
    protected $apartmentserviceService;

    protected $serviceService;

    public function __construct(ApartmentService $apartmentService,ApartmentServiceService $apartmentserviceService, ServiceService $serviceService)
    {
        $this->apartmentService = $apartmentService;
        $this->apartmentserviceService = $apartmentserviceService;
        $this->serviceService = $serviceService;
    }
    public function add_service(){
        return view('admin.service.add_ApartmentService',[
            'title' => "THÊM DỊCH VỤ CHO CĂN HỘ",
            'services' => $this->serviceService->get(),
            'departments' => $this->apartmentService->get(),
        ]);
    }

    public function add_service_update(ApartmentServiceRequest $request){
        //dd($request->input());
        $this->apartmentserviceService->createDepartmentService($request);

        return redirect()->back();
    }
}
