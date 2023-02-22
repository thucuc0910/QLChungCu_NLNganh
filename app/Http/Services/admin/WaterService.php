<?php

namespace App\Http\Services\admin;

use App\Models\Water;
use App\Models\Month_water;
use App\Models\Month;
use App\Models\Year;
use App\Models\Apartment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

use App\Models\Department;
class WaterService{

    public function getWater($id)
    {
        $a = $id;
        
        return    Water::where('month_water_id','=',$a)->get();
            
    }
    public function get()
    {
        return Water::All();
    }
    public function getWaterMonth()
    {
        return Month_water::All();
    }
    public function getWaterMonthLast()
    {
        return Month_water::latest('id')->first();
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