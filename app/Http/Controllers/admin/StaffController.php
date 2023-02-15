<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Http\Services\admin\StaffService;
use App\Http\Requests\admin\StaffRequest;
use App\Models\Staff;
use App\Models\City;
use App\Models\Provine;
use App\Models\Ward;



class StaffController extends Controller
{
    protected $StaffService;

    public function __construct(StaffService $StaffService)
    {
        $this->StaffService = $StaffService;
    }

    public function add()
    {
        $city = $this->StaffService->getCity();

        return view('admin.staff.add', [
            'title' => 'THÊM NHÂN VIÊN',
            // 'provines' => $this->StaffService->getProvine(),
            // 'wards' => $this->StaffService->getWard(),

        ])->with(compact('city'));
    }

    public function add_staff(Request $request){
        $data = $request->all();
        $staff = new Staff();
        $staff -> name= $data['name'];
        $staff -> email = $data['email'];
        $staff -> CMND = $data['CMND'];
        $staff -> position = $data['position'];
        $staff ->birthday = $data['birthday'];
        $staff -> gender = $data['gender'];
        $staff -> city = $data['city'];
        $staff -> provine = $data['provine'];
        $staff -> ward = $data['ward'];
        $staff->save();


    }

    public function select_address(Request $request)
    {

        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $add_provine = Provine::where('matp', $data['ma_id'])->orderBy('maqh','ASC')->get();
                $output .= '<option>----------Chọn quận huyện--------</option>';
                foreach ($add_provine as $key => $provine) {
                    $output .= '<option value="'. $provine->maqh .'">'. $provine->name .'</option>';
                }
            } else {
                $add_ward = Ward::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output .= '<option>----------Chọn xã phường--------</option>';
                foreach ($add_ward as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }

        }
        echo $output;
    }

    public function create(StaffRequest $request)
    {
        //dd($request->input());
        $this->StaffService->create($request);

        return redirect()->back();
    }

    public function list()
    {

        return view('admin.staff.list', [
            'title' => "DANH SÁCH NHÂN VIÊN",
            'staffs' => $this->StaffService->get(),
        ]);
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', [
            'title' => 'CẬP NHẬT NHÂN VIÊN',
            'staff' => $staff,
            'cities' => $this->StaffService->getCity(),
            'provines' => $this->StaffService->getProvine(),
            'wards' => $this->StaffService->getWard(),


        ]);
    }

    public function update(Staff $staff, StaffRequest $request)
    {
        $this->StaffService->update($request, $staff);

        return redirect('/admin/staff/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->StaffService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công nhân viên.'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
