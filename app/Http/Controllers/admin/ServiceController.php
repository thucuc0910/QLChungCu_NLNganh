<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Http\Services\admin\ServiceService;
use App\Http\Requests\admin\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function add()
    {
        return view('admin.service.add', [
            'title' => 'THÊM DỊCH VỤ',
        ]);
    }

    public function create(ServiceRequest $request)
    {

        $this->serviceService->create($request);

        return redirect()->back();
    }

    public function list()
    {
        return view('admin.service.list',[
            'title' => "DANH SÁCH DỊCH VỤ",
            'services' => $this->serviceService->get(),
        ]);
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', [
            'title' => 'CẬP NHẬT DỊCH VỤ',
            'service' => $service,
        ]);
    }

    public function update(Service $service, ServiceRequest $request )
    {
        $this->serviceService->update($request, $service);

        return redirect('/admin/service/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->serviceService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công dịch vụ.'
            ]);
        }
        return response()->json([
            'error' => true  
        ]);
    }
}
