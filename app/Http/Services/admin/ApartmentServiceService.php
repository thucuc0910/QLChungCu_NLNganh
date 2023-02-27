<?php

namespace App\Http\Services\admin;

use App\Models\ApartmentService;
use Brick\Math\BigInteger;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class ApartmentServiceService
{

    public function createDepartmentService($request)
    {

        try {
            ApartmentService::create([
                'apartment_id' => (integer)$request->input('apartment_id'),
                'service_id' => (Integer)$request->input('service_id'),
                'date_start' => $request->input('date_start'),
                'date_end' => $request->input('date_end'),
            ]);
 
            session()->flash('success', 'Tạo căn hộ thành công');
             //dd ($request->input());
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }
 
         return true;
    }

    
}