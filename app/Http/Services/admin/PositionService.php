<?php

namespace App\Http\Services\admin;

use App\Models\Position;
use App\Models\User;
use App\Models\Department;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class PositionService{

    

    public function create($request)
    {
        try {
            Position::create([
                'name' => (string) $request->input('name'),
            ]);
            session()->flash('success', 'Thêm chức vụ thành công');
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }
 
         return true;
    }

    public function update($request, $position): bool
    {
        $position -> name = (string) $request->input('name');
        $position ->save();

        Session::flash('success', 'Cập nhật thành công chức vụ');
        return true;
    }

    public function delete($request)
    {
        $position = Position::where('id', $request->input('id'))->first();
        if ($position) {
            $position->delete();
            return true;
        }

        return false;
    }
    

}