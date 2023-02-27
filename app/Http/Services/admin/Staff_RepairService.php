<?php

namespace App\Http\Services\admin;

use App\Models\Service;
use App\Models\Apartment;
use App\Models\Repair;
use App\Models\Staff_Repair;
use App\Models\Staff;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class Staff_RepairService
{


    public function get()
    {
        return Repair::orderBy('id')->paginate(15);
    }

    public function getApartment()
    {
        return Apartment::all();
    }

    public function getStaff()
    {
        return Staff::all();
    }

    public function getStaffRepair()
    {
        return Staff_Repair::all();
    }

    public function getStaffRepairById($id)
    {
        return Staff_Repair::where('repair_id','==',$id);
    }

}
