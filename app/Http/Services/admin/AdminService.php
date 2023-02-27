<?php

namespace App\Http\Services\admin;

use App\Models\Admin;
use App\Models\Staff;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class AdminService{


    public function get(){
        return Admin::orderBy('id')->paginate(15);
    }

    public function getStaff(){
        return Staff::all();
    }

    public function create($request)
    {
        $pass=Hash::make($request->id);
        try {
            Admin::create([
                'name' => (string) $request->input('name'),
                'staff_id' => (integer) $request->input('staff_id'),
                'email' => (string) $request->input('email'),
                'password' => (string) $pass,
                // 'status' => (integer) $request->input('status')
            ]);
 
            session()->flash('success', 'Tạo tài khoản thành công');
             //dd ($request->input());
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }
 
         return true;
    }


    public function update($request, $admin): bool
    {
        $admin->name = (string)$request->input('name');
        $admin->staff_id = (integer)$request->input('staff_id');
        $admin->email = (string)$request->input('email');
        $admin->password = (string)$request->input('password');
        $admin->save();

        Session::flash('success', 'Cập nhật thành công tài khoản');
        return true;
    }

    public function delete($request)
    {
        $id = $request->input('id');
        $admin = Admin::where('id', $id)->first();
        if ($admin) {
            $admin->delete();
            return true;
        }

        return false;
    }

}