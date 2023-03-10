<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Http\Services\admin\StaffService;
use App\Http\Requests\admin\StaffRequest;
use App\Models\Staff;
use App\Models\City;
use App\Models\District;
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
            'admins' => $this->StaffService->getAdmin(),
            'positions' => $this->StaffService->getPosition(),
        ])->with(compact('city'));
    }

    public function add_staff(Request $request){
        $data = $request->all();
        $staff = new Staff();
        $staff -> name= $data['name'];
        $staff -> phone = $data['phone'];
        $staff -> CMND = $data['CMND'];
        $staff -> position_id = $data['position_id'];
        $staff ->birthday = $data['birthday'];
        $staff -> gender = $data['gender'];
        $staff -> city = $data['city'];
        $staff -> district = $data['district'];
        $staff -> ward = $data['ward'];
        $staff->save();


    }

    public function select_address(Request $request)
    {

        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $add_district = District::where('matp', $data['ma_id'])->orderBy('maqh','ASC')->get();
                $output .= '<option>----------Chọn quận huyện--------</option>';
                foreach ($add_district as $key => $district) {
                    $output .= '<option value="'. $district->maqh .'">'. $district->name .'</option>';
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

    public function list(Request $request)
    {
        $staffs = Staff::paginate(10);

        if ($request->search) {
            $staffs = Staff::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $staffs->appends(['search' => $request->search]);
        }

        return view('admin.staff.list', [
            'title' => "DANH SÁCH NHÂN VIÊN",
            'staffs' => $staffs,
            'positions' => $this->StaffService->getPosition(),
        ]);
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', [
            'title' => 'CẬP NHẬT NHÂN VIÊN',
            'staff' => $staff,
            'admins' => $this->StaffService->getAdmin(),
            'positions' => $this->StaffService->getPosition(),
            'cities' => $this->StaffService->getCity(),
            'districts' => $this->StaffService->getDistrict(),
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
