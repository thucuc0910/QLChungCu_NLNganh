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

    public function getElectricity($id)
    {
        $a = $id;
        
        return    Electricity::where('month_electric_id','=',$a)->get();
            
    }
    public function get()
    {
        return Electricity::All();
    }
    public function getElectricityMonth()
    {
        return Month_electricity::All();
    }
    public function getElectricityMonthLast()
    {
        return Month_electricity::latest('id')->first();
    }
    public function getMonth()
    {
        return Month::All();
    }
    public function getYear()
    {
        return Year::All();
    }

    public function getApartment()
    {
        return Apartment::all();
    }
     
}