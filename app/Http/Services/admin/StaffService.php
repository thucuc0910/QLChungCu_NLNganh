<?php

namespace App\Http\Services\admin;

use App\Models\Staff;
use App\Models\City;
use App\Models\Provine;
use App\Models\Ward;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class StaffService
{


    public function get()
    {
        return Staff::orderByDesc('id')->paginate(15);
    }

    public function getCity()
    {
        return City::orderBy('matp','ASC')->get();
    }

    public function getProvine()
    {
        return Provine::orderBy('maqh','ASC')->get();
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
                'email' => (string) $request->input('email'),
                'CMND' => (string) $request->input('CMND'),
                'gender' => (integer) $request->input('gender'),
                'birthday' => $request->input('birthday'),
                'position' => (string) $request->input('position'),
                'city' => (string) $request->input('address'),
                'provine' => (string) $request->input('address'),
                'ward' => (string) $request->input('address'),

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
        $staff->email = (string) $request->input('email');
        $staff->CMND = (string) $request->input('CMND');
        $staff->gender = (integer) $request->input('gender');
        $staff->birthday = $request->input('birthday');
        $staff->position = (string) $request->input('position');
        $staff->city = (string) $request->input('city');
        $staff->provine = (string) $request->input('provine');
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
