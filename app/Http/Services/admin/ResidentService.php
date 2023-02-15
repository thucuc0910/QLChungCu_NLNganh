<?php

namespace App\Http\Services\admin;

use App\Models\Resident;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

use App\Models\Department;
class ResidentService{

    public function get(){
        return Resident::orderByDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try {
            Resident::create([
                'department_code' => (string) $request->input('department_code'),
                'name' => (string) $request->input('name'),
                'phone' => (string) $request->input('phone'),
                'CMND' => (string) $request->input('CMND'),
                'gender' => (integer) $request->input('gender'),
                'birthday' => $request->input('birthday'),
                'address' => (string) $request->input('address'),
                'status' => (string) $request->input('status')
            ]);
 
            session()->flash('success', 'Thêm cư dân thành công');
             //dd ($request->input());
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }
 
         return true;
    }


    public function update($request, $resident): bool
    {
        $resident -> department_code = (string) $request->input('department_code');
        $resident -> name = (string) $request->input('name');
        $resident -> phone = (string) $request->input('phone');
        $resident -> CMND = (string) $request->input('CMND');
        $resident -> gender = (integer) $request->input('gender');
        $resident->birthday = $request->input('birthday');
        $resident -> address = (string) $request->input('address');
        $resident -> status = (string) $request->input('status');
        $resident ->save();

        Session::flash('success', 'Cập nhật thành công cư dân');
        return true;
    }

    public function delete($request)
    {
        $resident = Resident::where('id', $request->input('id'))->first();
        if ($resident) {
            $resident->delete();
            return true;
        }

        return false;
    }

    public function getDepartment()
    {
        return Department::where('status' , '>=', 0)->get();
    }

}