<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Services\admin\Apartment_Service;
use App\Http\Services\admin\ServiceService;
use App\Http\Requests\admin\ApartmentRequest;
use App\Models\Apartment;
use App\Models\ApartmentService;
use App\Models\Resident;


use Symfony\Component\HttpFoundation\JsonResponse;

// use App\Models\ApartmentService;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    protected $apartmentService;
    protected $serviceService;

    public function __construct(Apartment_Service $apartmentService, ServiceService $serviceService)
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

    public function list(Request $request)
    {
        $apartments = Apartment::paginate(8);

        if ($request->search) {
            $apartments = Apartment::where('code', 'like', '%'.$request->search.'%')->paginate(8);
            $apartments->appends(['search' => $request->search]);
        }

        $residents = Resident::all();

        return view('admin.apartment.list',[
            'title' => "DANH SÁCH CĂN HỘ",
            'apartments' => $apartments,
            'residents' => $residents,
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

    public function service(Apartment $apartment)
    {
        $id = $apartment->id;
        // dd($id);
        $all_service = $this->apartmentService->getService();
        $services = $this->apartmentService->getApartmentService($id);
        return view('admin.apartment.service', [
            'title' => 'DỊCH VỤ MÀ CĂN HỘ ĐANG SỬ DỤNG',
            'apartment' => $apartment,
            'services' => $services,
            'all_service' => $all_service,
        ]);
    }

    public function delete(Request $request): JsonResponse
    {
        $result = $this->apartmentService->deleteApartmentService($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công dịch vụ của căn hộ.'
            ]);
        }
        return response()->json([
            'error' => true  
        ]);
    }

    

}
