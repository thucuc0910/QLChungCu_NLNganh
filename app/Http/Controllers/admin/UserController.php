<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\admin\UserService;
use App\Http\Services\admin\DepartmentService;
use App\Http\Requests\admin\UserRequest;
use App\Models\User;

use Symfony\Component\HttpFoundation\JsonResponse;


use Illuminate\Http\Request;
class UserController extends Controller
{
    protected $departmentService;
    protected $userService;


    public function __construct(UserService $userService, DepartmentService $departmentService)
    {
        $this->userService = $userService;
        $this->departmentService = $departmentService;
    }

    public function add()
    {
        return view('admin.user.add', [
            'title' => 'THÊM TÀI KHOẢN',
            'departments' => $this->departmentService->getDepartment()
            // 'users' => $this->userService->getParent()
        ]);
    }
    public function create(UserRequest $request)
    {
        //dd($request->input());
        $this->userService->create($request);

        return redirect()->back();
    }
    public function list()
    {
        return view('admin.user.list',[
            'title' => "DANH SÁCH TÀI KHOẢN",
            'users' => $this->userService->get()
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'title' => 'CẬP NHẬT TÀI KHOẢN',
            'user' => $user,
            'departments' => $this->departmentService->getDepartment()
        ]);
    }

    

    public function update(User $user, UserRequest $request )
    {
        $this->userService->update($request, $user);

        return redirect('/admin/account/list');
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->userService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công tài khoản.'
            ]);
        }
        return response()->json([
            'error' => true  
        ]);
    }

}