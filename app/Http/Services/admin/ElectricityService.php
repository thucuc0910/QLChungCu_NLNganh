<?php

namespace App\Http\Services\admin;

use App\Models\Electricity;
use App\Models\Month_electricity;
use App\Models\Month;
use App\Models\Year;
use App\Models\Apartment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

use App\Models\Department;
class ElectricityService{

    public function getElectricity($id){
        // $id = $month->id;
        $a = $id;
        // dd($a);
        return Electricity::where('month_electric_id','=',$a)->get();
    }
    public function get(){
        return Electricity::All();
    }
    public function getElectricityMonth(){
        return Month_electricity::All();
    }
    public function getMonth(){
        return Month::All();
    }
    public function getYear(){
        return Year::All();
    }

    public function getApartment()
    {
        return Apartment::all();
    }
    // public function create($month)
    // {
    //     $apartments = $this->electricityService->getApartment();
    //     foreach ($apartments as $key => $temp) {
    //         // $data = new Electricity;
    //         $month= $month->id;
    //         $apartment_id = $temp->id

    //         $data->old = 0;
    //         $data->new = 0;
    //         $data->total = 0;
    //         $data->save();
    //         // try {
    //         //     Electricity::create([
    //         //         'month_electric_id' => $month,
    //         //         'apartment_id' => $apartment_id,
    //         //         'old' => 0,
    //         //         'new' => 0,
    //         //         'total' => 0
    //         //     ]);
     
    //         //     session()->flash('success', 'Cập nhật chỉ số điện thành công');
    //         //      //dd ($request->input());
    //         //  } catch (\Exception $err) {
    //         //      session()->flash('error', $err->getMessage());
    //         //      return false;
    //         //  }
     
    //         //  return true;
    //     }
    //     // dd($a);
        
    // }


    // public function update($request, $resident): bool
    // {
    //     $resident -> department_code = (string) $request->input('department_code');
    //     $resident -> name = (string) $request->input('name');
    //     $resident -> phone = (string) $request->input('phone');
    //     $resident -> CMND = (string) $request->input('CMND');
    //     $resident -> old = (integer) $request->input('old');
    //     $resident->birthday = $request->input('birthday');
    //     $resident -> address = (string) $request->input('address');
    //     $resident -> status = (string) $request->input('status');
    //     $resident ->save();

    //     Session::flash('success', 'Cập nhật thành công cư dân');
    //     return true;
    // }

    // public function delete($request)
    // {
    //     $resident = Electricity::where('id', $request->input('id'))->first();
    //     if ($resident) {
    //         $resident->delete();
    //         return true;
    //     }

    //     return false;
    // }

    // public function getResident()
    // {
    //     return Electricity::where('department_code' , '!=', NULL)->get();
    // }

}