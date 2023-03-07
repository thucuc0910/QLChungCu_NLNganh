<?php

namespace App\Http\Controllers\admin;

use App\Http\Services\admin\Apartment_Service;
use App\Http\Services\admin\ServiceService;
use App\Http\Services\admin\ApartmentServiceService;
use App\Http\Requests\admin\ApartmentServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentServiceController extends Controller
{
    protected $apartmentService;
    protected $apartment_serviceService;

    protected $serviceService;

    public function __construct(Apartment_Service $apartmentService,ApartmentServiceService $apartment_serviceService, ServiceService $serviceService)
    {
        $this->apartmentService = $apartmentService;
        $this->apartment_serviceService = $apartment_serviceService;
        $this->serviceService = $serviceService;
    }
    public function add_service(){
        return view('admin.service.add_ApartmentService',[
            'title' => "THÊM DỊCH VỤ CHO CĂN HỘ",
            'services' => $this->serviceService->get(),
            'apartments' => $this->apartmentService->get(),
        ]);
    }

    public function add_service_update( Request $request){
        $this->apartment_serviceService->createDepartmentService($request);

        return redirect()->back();
    }
}
