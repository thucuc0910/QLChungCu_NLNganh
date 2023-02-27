<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\AdminService;
use App\Http\Requests\admin\AdminRequest;
use App\Models\Admin;

use Symfony\Component\HttpFoundation\JsonResponse;

class Admin_Controller extends Controller
{
    protected $adminService;


    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function add()
    {
        return view('admin.user.add_staff', [
            'title' => 'THÊM TÀI KHOẢN CHO NỘI BỘ',
            'staffs' => $this->adminService->getStaff()
        ]);
    }
    public function create(AdminRequest $request)
    {
        //dd($request->input());
        $this->adminService->create($request);

        return redirect()->back();
    }
    public function list()
    {
        return view('admin.user.list_staff',[
            'title' => "DANH SÁCH TÀI KHOẢN NỘI BỘ",
            'admins' => $this->adminService->get(),
        ]);
    }

    public function edit(Admin $admin)
    {
        return view('admin.user.edit_staff', [
            'title' => 'CẬP NHẬT TÀI KHOẢN',
            'admin' => $admin,
            'staffs' => $this->adminService->getStaff()
        ]);
    }

    

    public function update(Admin $admin, AdminRequest $request )
    {
        $this->adminService->update($request, $admin);

        return redirect('/admin/account/list_staff');
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->adminService->delete($request);
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
