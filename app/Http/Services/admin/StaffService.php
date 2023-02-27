<?php

namespace App\Http\Services\admin;

use App\Models\Staff;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Admin;
use App\Models\Position;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class StaffService
{


    public function get()
    {
        return Staff::orderBy('id')->paginate(15);
    }

    public function getAdmin()
    {
        return Admin::all();
    }

    public function getPosition()
    {
        return Position::all();
    }
    public function getCity()
    {
        return City::orderBy('matp','ASC')->get();
    }

    public function getDistrict()
    {
        return District::orderBy('maqh','ASC')->get();
    }

    public function getWard()
    {
        return Ward::orderBy('xaid','ASC')->get();
    }


    public function create($request)
    {
        try {
            Staff::create([
                'name' => (string) $request->input('name'),
                'phone' => (string) $request->input('phone'),
                'CMND' => (string) $request->input('CMND'),
                'gender' => (integer) $request->input('gender'),
                'birthday' => $request->input('birthday'),
                'position_id' => (string) $request->input('position_id'),
                'city' => (string) $request->input('city'),
                'district' => (string) $request->input('district'),
                'ward' => (string) $request->input('ward'),

            ]);

            session()->flash('success', 'Thêm nhân viên thành công');
            //dd ($request->input());
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return true;
    }


    public function update($request, $staff): bool
    {

        $staff->name = (string) $request->input('name');
        $staff->phone = (string) $request->input('phone');
        $staff->CMND = (string) $request->input('CMND');
        $staff->gender = (integer) $request->input('gender');
        $staff->birthday = $request->input('birthday');
        $staff->position_id = (string) $request->input('position_id');
        $staff->city = (string) $request->input('city');
        $staff->district = (string) $request->input('district');
        $staff->ward = (string) $request->input('ward');
        $staff->save();

        Session::flash('success', 'Cập nhật thành công nhân viên');
        return true;
    }

    public function delete($request)
    {
        $staff = Staff::where('id', $request->input('id'))->first();
        if ($staff) {
            $staff->delete();
            return true;
        }

        return false;
    }
}
