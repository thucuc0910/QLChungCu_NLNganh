<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\ResidentService;
use App\Http\Services\admin\ApartmentService;
use App\Http\Services\admin\ElectricityService;
use App\Http\Requests\admin\ResidentRequest;
use App\Models\Resident;
use App\Models\Electricity;
use App\Models\Month;
use Illuminate\Cache\NullStore;
use Symfony\Component\HttpFoundation\JsonResponse;

class ElectricityController extends Controller
{
    protected $residentService;
    protected $apartmentService;

    protected $electricityService;

    public function __construct(ResidentService $residentService, ApartmentService $apartmentService, ElectricityService $electricityService)
    {
        $this->residentService = $residentService;
        $this->apartmentService = $apartmentService;
        $this->electricityService = $electricityService;
    }

    public function month_electric()
    {
        return view('admin.electric_water.electric', [
            'title' => 'Quản lý chỉ số điện',
            'electricitymonths' => $this->electricityService->getElectricityMonth(),
            'ms' => $this->electricityService->getMonth(),
            'years' => $this->electricityService->getYear(),
        ]);
    }
    public function list_electricity(Month $month)
    {
        $id = $month->id;
        $apartments = $this->electricityService->getApartment();
        $electricities = $this->electricityService->getElectricity($id);
        $a=0;
        foreach($electricities as $b => $electricity){
            $a= $a + 1;
        }


        // dd($electricities);
        if ($a == 0) {
            foreach ($apartments as $key => $temp) {
                $data = new Electricity;
                $data->month_electric_id = $month->id;
                $data->apartment_id = $temp->id;
                $data->old = 0;
                $data->new = 0;
                $data->total = 0;
                $data->save();
            }
        }
        return view('admin.electric_water.list_electric', [
            'title' => 'QUẢN LÝ CHỈ SỐ ĐIỆN',
            'electricities' => $this->electricityService->get(),
            'apartments' => $this->electricityService->getApartment(),
            'months' => $this->electricityService->getMonth(),
        ]);
    }

    // public function create(Request $request)
    // {

    //     // echo 123;
    //     $this->electricityService->create($request);

    //     return redirect()->back();
    // }
    // public function add()
    // {
    //     return view('admin.resident.add', [
    //         'title' => 'THÊM CƯ DÂN',
    //         'departments' => $this->residentService->getDepartment()
    //         // 'residents' => $this->residentService->getParent()
    //     ]);
    // }
    // public function create(ResidentRequest $request)
    // {
    //     $this->residentService->create($request);

    //     return redirect()->back();
    // }
    // public function list()
    // {
    //     return view('admin.resident.list',[
    //         'title' => "DANH SÁCH CƯ DÂN",
    //         'residents' => $this->residentService->get(),
    //         'departments' =>    $this->apartmentService->get(),
    //     ]);
    // }

    // public function edit(Resident $resident)
    // {
    //     return view('admin.resident.edit', [
    //         'title' => 'CẬP NHẬT CƯ DÂN',
    //         'resident' => $resident,
    //         'departments' => $this->residentService->getDepartment()
    //     ]);
    // }



    // public function update(Resident $resident, ResidentRequest $request )
    // {
    //     $this->residentService->update($request, $resident);

    //     return redirect('/admin/resident/list');
    // }


    // public function destroy(Request $request): JsonResponse
    // {
    //     $result = $this->residentService->delete($request);
    //     if($result){
    //         return response()->json([
    //             'error' => false,
    //             'message' => 'Xoá thành công cư dân.'
    //         ]);
    //     }
    //     return response()->json([
    //         'error' => true  
    //     ]);
    // }
}
