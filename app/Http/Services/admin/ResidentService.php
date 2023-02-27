<?php

namespace App\Http\Services\admin;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

use App\Models\Department;
class ResidentService{

    public function get(){
        return Resident::orderBy('id')->paginate(15);
    }

    public function getUser(){
        return User::all();
    }

    public function getResident()
    {
        return Resident::where('apartment_id' , '!=', NULL)->get();
    }

    public function create($request)
    {
        try {
            Resident::create([
                'name' => (string) $request->input('name'),
                'apartment_id' => (integer) $request->input('apartment_id'),
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
        $resident -> name = (string) $request->input('name');
        $resident -> apartment_id = (integer) $request->input('apartment_id');
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

}