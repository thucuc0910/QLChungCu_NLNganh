<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Services\admin\ApartmentService;
use App\Http\Services\admin\ServiceService;
use App\Http\Requests\admin\ApartmentRequest;
use App\Models\Apartment;

use Symfony\Component\HttpFoundation\JsonResponse;


use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    protected $apartmentService;
    protected $serviceService;

    public function __construct(ApartmentService $apartmentService, ServiceService $serviceService)
    {
        $this->apartmentService = $apartmentService;
        $this->serviceService = $serviceService;
    }

    public function add()
    {
        return view('admin.apartment.add', [
            'title' => 'THÊM CĂN HỘ',
            // 'users' => $this->userService->getParent()
        ]);
    }

    public function create(ApartmentRequest $request)
    {
        //dd($request->input());
        $this->apartmentService->create($request);

        return redirect()->back();
    }

    public function list()
    {
        return view('admin.apartment.list',[
            'title' => "DANH SÁCH CĂN HỘ",
            'apartments' => $this->apartmentService->get(),
        ]);
    }

    public function edit(Apartment $apartment)
    {
        return view('admin.apartment.edit', [
            'title' => 'CẬP NHẬT CĂN HỘ',
            'apartment' => $apartment,
        ]);
    }

    public function update(Apartment $apartment, ApartmentRequest $request )
    {
        $this->apartmentService->update($request, $apartment);

        return redirect('/admin/apartment/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->apartmentService->delete($request);
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
