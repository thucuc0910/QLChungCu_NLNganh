<?php

namespace App\Http\Services\admin;

use App\Models\Department;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class DepartmentService
{

    public function get(){

        // dd(123);
        // $a=Department::orderByDesc('id');
        // dd($a);
        return Department::orderBy('id')->paginate(15);
    }

    public function create($request)
    {
        // $pass=Hash::make($request->password);
        try {
            Department::create([
                'code' => (string) $request->input('code'),
                'floor' => (integer) $request->input('floor'),
                'length' => (double) $request->input('length'),
                'width' => (double) $request->input('width'),
                'direction' => (string) $request->input('direction'),
                'status' => (integer) $request->input('status'),
                'price' => (integer) $request->input('price'),
                'description' => (string) $request->input('description'),
            ]);
 
            session()->flash('success', 'Tạo căn hộ thành công');
             //dd ($request->input());
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }
 
         return true;
    }

    public function update($request, $department): bool
    {
        // dd($department->email);
        $department->code = (string)$request->input('code');
        $department->floor = (integer)$request->input('floor');
        $department->length = (double)$request->input('length');
        $department->width= (double)$request->input('width');
        $department->description = (string)$request->input('description');
        $department->status = (integer)$request->input('status');
        $department->direction = (string)$request->input('directrion');
        $department->save();

        Session::flash('success', 'Cập nhật thành công căn hộ');
        return true;
    }

    public function delete($request)
    {
        $department = Department::where('id', $request->input('id'))->first();
        if ($department) {
            $department->delete();
            return true;
        }

        return false;
    }

    public function getDepartment()
    {
        return Department::where('status' , '>=', 0)->get();
    }

    
}