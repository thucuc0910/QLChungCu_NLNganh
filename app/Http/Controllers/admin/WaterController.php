<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\ResidentService;
use App\Http\Services\admin\Apartment_Service;
use App\Http\Services\admin\WaterService;
use App\Http\Requests\admin\WaterRequest;
use App\Models\Water;
use App\Models\Month;
use App\Models\Month_water;
use Illuminate\Cache\NullStore;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Session;

class WaterController extends Controller
{
    protected $residentService;
    protected $apartmentService;

    protected $waterService;

    public function __construct(ResidentService $residentService, Apartment_Service $apartmentService, WaterService $waterService)
    {
        $this->residentService = $residentService;
        $this->apartmentService = $apartmentService;
        $this->waterService = $waterService;
    }

    public function month_water()
    {
        return view('admin.electric_water.water', [
            'title' => 'QUẢN LÝ NƯỚC',
            'watermonths' => $this->waterService->getWaterMonth(),
            'ms' => $this->waterService->getMonth(),
            'years' => $this->waterService->getYear(),
        ]);
    }
    public function list_water(Month $month)
    {
        $id = $month->id;
        $apartments = $this->waterService->getApartment();
        $waters = $this->waterService->getWater($id);
        $a = 0;
        $total = 0;
        foreach ($waters as $b => $water) {
            $a = $a + 1;
            if($water->new == 0)
                $total = $total + $water->new;
            elseif($water->new > 0){
                $total = $total + $water->new - $water->old;
            }
        };

        if ($a == 0) {
            foreach ($apartments as $y => $temp) {
                $data = new Water;
                $data->month_water_id = $month->id;
                $data->apartment_id = $temp->id;
                $data->old = 0;
                $data->new = 0;
                $data->save();
            }
        } elseif ($a > 0) {
            $b = Water::where('month_water_id', '=', $id)->first();
            $c = $b->month_water_id;
            $d = $c - 1;
            if ($id > 0) {
                $e = Water::where('month_water_id', '=', $d)->get();
                foreach ($e as $x => $t) {
                    foreach ($waters as $s => $water) {
                        if ($water->apartment_id == $t->apartment_id) {
                            $water->old = $t->new;
                            $water->save();
                        }
                    };
                }
            }
        }

        $month_waters = Month_water::all();

        return view('admin.electric_water.list_water', [
            'title' => 'QUẢN LÝ CHỈ SỐ NƯỚC',
            'waters' => $this->waterService->getWater($id),
            'total' => $total,
            'month_waters' => $month_waters,
            'apartments' => $this->waterService->getApartment(),
            'months' => $this->waterService->getMonth(),
            'years' => $this->waterService->getYear(),
        ]);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // $id = $month->id;
        $total = 0;
        $waters = $this->waterService->get();
        if ($waters == true) {
            foreach ($data['new'] as $key => $new) {
                foreach ($waters as $t => $water) {
                    if ($water['id'] == $key) {
                        $water['new'] = $new;
                        $water->save();
                    }
                }
            }
            Session::flash('success', 'Cập nhật chỉ số điện thành công.');
            return redirect()->back();
        }
    }

    public function add(Request $request)
    {
        $watermonths = $this->waterService->getWaterMonthLast();

        $waters = $this->waterService->getWaterMonth();
        $a = 0;
        foreach($waters as $key => $water){

            $a = $a + 1;

        }

        if ($a >0 ) {
            $data = new Month_water;
            if ($watermonths->month_id < 12) {
                $data->month_id = $watermonths->month_id + 1;
                $data->year_id = $watermonths->year_id;
            } elseif ($watermonths->month_id == 12) {
                $data->month_id = 12;
                $data->year_id = $watermonths->year_id + 1;
            }

            $data->save();
        }elseif($a == 0){
            $data = new Month_water;
            $data->month_id =  1;
            $data->year_id = 1;
            $data->save();
        }


        return redirect()->back();
    }
}
