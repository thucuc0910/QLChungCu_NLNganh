<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'Đăng nhập'
        ]);
    }

    public function house(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email:filter',
                'password' => 'required',
            ],
            [   'email.required' => 'Email không được bỏ trống',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được bỏ trống'
            ]);

            if (Auth::attempt([
                
                'email' => $request->input(key: 'email'),
                'password' => $request->input(key: 'password'),
                'type' => 'adm'
            ], $request->input(key: 'remember'))) {

            session()->flash('success', 'Đăng nhập thành công');
            return redirect()->route(route: 'admin');
        }
        elseif(Auth::attempt([

                'email' => $request->input(key: 'email'),
                'password' => $request->input(key: 'password'),
                'type' => 'usr'
            ], $request->input(key: 'remember'))){
                
                session()->flash('success', 'Đăng nhập thành công');
                return redirect()->route(route: 'user');
        }
        session()->flash('error', 'Email hoặc Mật khẩu không chính xác');
        return redirect()->back();
    }
}
