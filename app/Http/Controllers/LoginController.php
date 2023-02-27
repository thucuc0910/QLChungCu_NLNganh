<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\ResidentService;
use App\Http\Services\admin\UserService;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    protected $userService;

    protected $residentService;


    public function __construct(UserService $userService, ResidentService $residentService)
    {
        $this->userService = $userService;
        $this->residentService = $residentService;
    }

    public function login()
    {
        return view('user.login');
    }

    public function home()
    {
        return view('user.house',[
            'title' => "CHUNG CƯ SUNHOUSE",
            'residents' => $this->userService->getResident(),
            'apartments' => $this->userService->getApartment(),
        ]);
    }

    public function about()
    {
        return view('user.about',[
            'title' => "CHUNG CƯ SUNHOUSE",
            'residents' => $this->userService->getResident()
        ]);
    }

    public function contact()
    {
        return view('user.contact',[
            'title' => "CHUNG CƯ SUNHOUSE",
            'residents' => $this->userService->getResident()
        ]);
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
        if(Auth::guard('web')->attempt($check)){
            return redirect('/user/home')->with('success', 'Đăng nhập thành công.');
        }else{
            return redirect()->back()->with('error', 'Lỗi đăng nhập');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/user/homepage');
    }
}
