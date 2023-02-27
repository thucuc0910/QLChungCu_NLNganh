<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\ResidentService;
use App\Http\Services\user\MainService;

use App\Http\Requests\user\RepairRequest;
use App\Http\Requests\user\FeedbackRequest;


use App\Models\User;
use App\Models\Resident;
use App\Models\Apartment;
use App\Models\ApartmentService;
use App\Models\Feedback;
use App\Models\Service;
use App\Models\Repair;

use Illuminate\Support\Facades\Session;


use Carbon\Carbon;

class MainController extends Controller
{
    protected $residentService;
    protected $apartmentService;

    protected $mainService;


    public function __construct(MainService $mainService, ResidentService $residentService)
    {
        $this->residentService = $residentService;
        $this->mainService = $mainService;
    }
    public function apartment(User $user)
    {
        $id = $user->resident_id;
        $resident = Resident::where('id', '=', $id)->get();

        foreach ($resident as $key => $r) {
            $apartment_id = $r->apartment_id;
        }
        $apartment = Apartment::where('id', '=', $apartment_id)->first();

        $service = ApartmentService::where('apartment_id', '=', $apartment_id)->get();


        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $now = $date->toDateString();

        return view('user.apartment', [
            'title' => "CHUNG CƯ SUNHOUSE",
            'residents' => $this->mainService->getResident(),
            'apartments' => $this->mainService->getApartmentAll(),
            'apartment' => $apartment,
            'services_apartment' => $service,
            'services' => $this->mainService->getService(),
            'now' => $now,
        ]);
    }

    public function repair(User $user)
    {
        return view('user.repair', [
            'title' => "CHUNG CƯ SUNHOUSE",
            'residents' => $this->mainService->getResident(),

        ]);
    }
    public function add_repair(User $user, Request $request, RepairRequest $repairRequest)
    {
        $id = $user->id;
        $resident = Resident::where('id', '=', $id)->get();

        foreach ($resident as $key => $r) {
            $apartment_id = $r->apartment_id;
            $resident_id = $r->id;
            $resident_name = $r->name;
        }

        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $now = $date->toDateString();

        $data = new Repair;
        $data->resident_id = $resident_id;
        $data->apartment_id = $apartment_id;
        $data->name = $resident_name;
        $data->date = $now;
        $data->content = $request->content;
        $data->status = 0;
        $data->save();

        Session::flash('success', 'Yêu cầu sửa chữa thành công.');

        return redirect()->back();
    }

    public function feedback(User $user)
    {
        return view('user.feedback', [
            'title' => "CHUNG CƯ SUNHOUSE",
            'residents' => $this->mainService->getResident(),

        ]);
    }

    public function add_feedback(User $user, Request $request, FeedbackRequest $feedbackRequest)
    {
        $id = $user->id;
        $resident = Resident::where('id', '=', $id)->get();

        foreach ($resident as $key => $r) {
            $resident_id = $r->id;
            $resident_name = $r->name;
        }

        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $now = $date->toDateString();

        $data = new Feedback();
        $data->resident_id = $resident_id;
        $data->name = $resident_name;
        $data->date = $now;
        $data->content = $request->content;
        $data->save();

        Session::flash('success', 'Thêm góp ý thành công.');

        return redirect()->back();
    }




    public function electricity_water(User $user)
    {
        return view('user.electricity_water', [
            'title' => "CHUNG CƯ SUNHOUSE",
            'residents' => $this->mainService->getResident(),

        ]);
    }
}
