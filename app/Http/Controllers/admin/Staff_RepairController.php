<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\Staff_RepairService;
use App\Http\Requests\admin\Staff_RepairRequest;
use App\Models\Repair;
use App\Models\Staff_Repair;


use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Session;

class Staff_RepairController extends Controller
{

    protected $staff_repairService;


    public function __construct(Staff_RepairService $staff_repairService)
    {
        $this->staff_repairService = $staff_repairService;
    }
    public function list()
    {
        $staff_repairs = $this->staff_repairService->getStaffRepair();
        $staffs =  $this->staff_repairService->getStaff();

        return view('admin.repair.list', [
            'title' => "QUẢN LÝ SỬA CHỮA",
            'repairs' => $this->staff_repairService->get(),
            'staff_repairs' => $staff_repairs,
            'staffs' => $staffs,
            'apartments' => $this->staff_repairService->getApartment(),
        ]);
    }

    public function edit(Repair $repair)
    {
        $id = $repair->id;
        $staff_repair = $this->staff_repairService->getStaffRepairById($id);
        $staff_repairs = $this->staff_repairService->getStaffRepair();

        $a = 0;

        foreach($staff_repairs as $b => $repair){
            if($repair->repair_id == $id){
                $a = 1;
            }
        }


        return view('admin.repair.edit', [
            'title' => "XỬ LÝ YÊU CẦU SỬA CHỮA",
            'repair' => $repair,
            'repairs' => $this->staff_repairService->get(),
            'staffs' => $this->staff_repairService->getStaff(),
            'staff_repairs' => $staff_repairs,
            'staff_repair' => $this->staff_repairService->getStaffRepairById($id),
            'a' => $a,
            'id' =>$id,
            'apartments' => $this->staff_repairService->getApartment(),
        ]);
    }

    public function update(Request $request, Repair $repair)
    {

        $staff_id = $request->staff_id;

        $date = $request->date;

        $id = $repair->id;

        $staff_repairs = $this->staff_repairService->getStaffRepair();

        $staff_repair = $this->staff_repairService->getStaffRepairById($id);

        $repairs = $this->staff_repairService->get();

        $a=0;
        foreach($staff_repairs as $b => $repair){
            if($repair->repair_id == $id){
                $a = 1;

            }
        }

        if($a == 1 ){
            foreach ($staff_repairs as $key => $repair) {
                if($repair->repair_id == $id){
                    $repair['staff_id'] = $staff_id;
                    $repair['date'] = $date;
                    $repair->save();
                    foreach($repairs as $r){
                        if($id == $r->repair_id){
                            if($staff_id !=NULL && $date == NULL ){
                                $r->status = 1;
                                $r->save();
                            }
                            if($staff_id !=NULL && $date != null){
                                $r->status = 2;
                                $r->save();
                            }
                        }
                    }
                    Session::flash('success', 'Xử lý yêu cầu sửa chữa thành công.');
                }
            }
        }elseif($a==0){
            $data = new Staff_Repair;
            $data->staff_id = $staff_id;
            $data->repair_id = $id;
            $data->date = $date;
            foreach($repairs as $repair){
                if($id == $repair->id){
                    if($staff_id !=NULL ){
                        $repair->status = 1;
                        $repair ->save();

                    }
                    if($staff_id !=NULL && $date != null){
                        $repair->status = 2;
                        $repair->save();
                    }
                }
            }
            $data->save();
            Session::flash('success', 'Xử lý yêu cầu sửa chữa thành công.');
        }
        return redirect('admin/repair/list');
    }
}
