<?php

namespace App\Http\Services\admin;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class UserService{


    public function get(){
        return User::orderByDesc('id')->paginate(15);
    }

    public function create($request)
    {
        $pass=Hash::make($request->password);
        try {
            User::create([
                'name' => (string) $request->input('name'),
                'phone' => (string) $request->input('phone'),
                'email' => (string) $request->input('email'),
                'password' => (string) $pass,
                'type' => (string) $request->input('type'),
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


    public function update($request, $user): bool
    {
        // dd($user->email);
        $user->name = (string)$request->input('name');
        $user->phone = (string)$request->input('phone');
        $user->email = (string)$request->input('email');
        $user->type = (string)$request->input('type');
        // $user->password = (string)$request->input('password');
        // $user->status = (integer)$request->input('status');
        $user->save();

        Session::flash('success', 'Cập nhật thành công tài khoản');
        return true;
    }

    public function delete($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }

}