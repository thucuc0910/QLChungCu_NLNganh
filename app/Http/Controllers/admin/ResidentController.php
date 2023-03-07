<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Services\admin\ResidentService;
use App\Http\Services\admin\Apartment_Service;
use App\Http\Requests\admin\ResidentRequest;
use App\Models\Resident;

use Symfony\Component\HttpFoundation\JsonResponse;


class ResidentController extends Controller
{
    protected $residentService;
    protected $apartmentService;


    public function __construct(ResidentService $residentService, Apartment_Service $apartmentService)
    {
        $this->residentService = $residentService;
        $this->apartmentService = $apartmentService;
    }

    public function add()
    {
        return view('admin.resident.add', [
            'title' => 'THÊM CƯ DÂN',
            'apartments' => $this->apartmentService->getApartment(),
            'users' => $this->residentService->getUser()
        ]);
    }
    public function create(ResidentRequest $request)
    {
        $this->residentService->create($request);

        return redirect()->back();
    }
    public function list(Request $request)
    {
        $residents = Resident::paginate(25);

        if ($request->search) {
            $residents = Resident::where('name', 'like', '%'.$request->search.'%')->paginate(25);
            $residents->appends(['search' => $request->search]);
        }

        return view('admin.resident.list',[
            'title' => "DANH SÁCH CƯ DÂN",
            'residents' => $residents,
            'apartments' =>    $this->apartmentService->get(),
        ]);
    }

    public function edit(Resident $resident)
    {
        return view('admin.resident.edit', [
            'title' => 'CẬP NHẬT CƯ DÂN',
            'resident' => $resident,
            'apartments' => $this->apartmentService->getApartment(),
            'users' => $this->residentService->getUser()
        ]);
    }

    

    public function update(Resident $resident, ResidentRequest $request )
    {
        $this->residentService->update($request, $resident);

        return redirect('/admin/resident/list');
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->residentService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công cư dân.'
            ]);
        }
        return response()->json([
            'error' => true  
        ]);
    }

    
}
