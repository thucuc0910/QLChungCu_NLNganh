<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\ResidentService;
use App\Http\Services\admin\ApartmentService;
use App\Http\Services\admin\ElectricityService;
use App\Http\Requests\admin\ElectricityRequest;
use App\Models\Electricity;
use App\Models\Month;
use App\Models\Month_electricity;
use Illuminate\Cache\NullStore;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Session;


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
        $a = 0;
        $total = 0;
        foreach ($electricities as $b => $electricity) {
            $a = $a + 1;
            $total = $total + $electricity->new;
        };

        if ($a == 0) {
            foreach ($apartments as $key => $temp) {
                $data = new Electricity;
                $data->month_electric_id = $month->id;
                $data->apartment_id = $temp->id;
                $data->old = 0;
                $data->new = 0;
                $data->save();
            }
        } elseif ($a != 0) {
            $b = Electricity::where('month_electric_id', '=', $id)->first();
            $c= $b->month_electric_id;
            $d = $c - 1;
            if ($id > 0) {
                $e = Electricity::where('month_electric_id', '=', $d)->get();
                foreach ($e as $key => $t) {
                    foreach ($electricities as $key => $electricity) {
                        if($electricity->apartment_id == $t->apartment_id){
                            $electricity->old = $t->new;
                            $electricity->save();
                        }
                    };
                }
            }
        }

        return view('admin.electric_water.list_electric', [
            'title' => 'QUẢN LÝ CHỈ SỐ ĐIỆN',
            'electricities' => $this->electricityService->getElectricity($id),
            'total' => $total,
            'apartments' => $this->electricityService->getApartment(),
            'months' => $this->electricityService->getMonth(),
        ]);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // $id = $month->id;
        $total = 0;
        $electricities = $this->electricityService->get();
        if ($electricities == true) {
            foreach ($data['new'] as $key => $new) {
                foreach ($electricities as $t => $electricity) {
                    if ($electricity['id'] == $key) {

                        $electricity['new'] = $new;
                        $electricity->save();
                    }
                }
            }
            Session::flash('success', 'Cập nhật chỉ số điện thành công.');
            return redirect()->back();
        }
    }

    public function add(Request $request)
    {
        $electricitymonths = $this->electricityService->getElectricityMonthLast();

        $data = new Month_electricity;
        if ($electricitymonths->month_id < 12) {
            $data->month_id = $electricitymonths->month_id + 1;
            $data->year_id = $electricitymonths->year_id;
        } elseif ($electricitymonths->month_id == 12) {
            $data->month_id = 12;
            $data->year_id = $electricitymonths->year_id + 1;
        }
        $data->save();

        return redirect()->back();
    }
}
