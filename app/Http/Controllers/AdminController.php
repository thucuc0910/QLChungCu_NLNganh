<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function home()
    {
        return view('admin.home', [
            'title' => "CHUNG CƯ SUNHOUSE"
        ]
);
    }

    public function house(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email:filter',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email không được bỏ trống',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được bỏ trống'
            ]
        );

        $check = $request->only('email','password');
        if(Auth::guard('admin')->attempt($check)){
            return redirect('/admin/apartment/list')->with('success', 'Đăng nhập thành công.');
        }else{
            return redirect()->back()->with('error', 'Lỗi đăng nhập');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
