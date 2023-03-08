<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\ReceiptService;

use App\Models\Receipt;
use App\Models\Month;
use App\Models\Month_receipt;


use Illuminate\Cache\NullStore;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Session;

class ReceiptController extends Controller
{


    protected $receiptService;

    public function __construct(ReceiptService $receiptService)
    {
        $this->receiptService = $receiptService;
    }
    public function index()
    {
        return view('admin.receipt.index', [
            'title' => "QUẢN LÝ THANH TOÁN TIỀN THUÊ",
            'receipt_months' => $this->receiptService->getReceiptMonth(),
            'ms' => $this->receiptService->getMonth(),
            'years' => $this->receiptService->getYear(),
        ]);
    }

    public function add()
    {
        // dd(123);
        $receipt_months = $this->receiptService->getReceiptMonthLast();

        $receipts = $this->receiptService->getReceiptMonth();
        $a = 0;
        foreach ($receipts as $key => $receipt) {

            $a = $a + 1;
        }

        if ($a > 0) {
            $data = new Month_receipt;
            if ($receipt_months->month_id < 12) {
                $data->month_id = $receipt_months->month_id + 1;
                $data->year_id = $receipt_months->year_id;
            } elseif ($receipt_months->month_id == 12) {
                $data->month_id = 1;
                $data->year_id = $receipt_months->year_id + 1;
            }
            $data->save();
        } elseif ($a == 0) {
            $data = new Month_receipt();
            $data->month_id =  1;
            $data->year_id = 1;
            $data->save();
        }
        return redirect()->back();
    }

    public function list_receipt(Month $month)
    {
        $id = $month->id;

        // dd($id);
        $apartments = $this->receiptService->getApartmentRent();
        $receipt = $this->receiptService->getReceipt($id);
        $a = 0;

        foreach ($receipt as $b => $receipt) {
            $a = $a + 1;
        };

        if ($a == 0) {
            foreach ($apartments as $y => $apartment) {
                $data = new Receipt;
                $temp = $apartment->id;
                $data->month_receipt_id = $id;
                $data->apartment_id = $apartment->id;
                $data->rent = $apartment->price;
                $data->electricity_bill = $this->receiptService->getElectricityPrice($temp);
                $data->water_bill = $this->receiptService->getWaterPrice($temp);
                $data->service_fee = $this->receiptService->getServicePrice($temp);
                $data->total = $data->rent + $data->electricity_bill + $data->water_bill + $data->service_fee;
                $data->status = 0;
                $data->save();
            }
        }

        return view('admin.receipt.list_receipt', [
            'title' => 'QUẢN LÝ TIỀN THUÊ',
            'receipts' => $this->receiptService->getReceipt($id),
            'apartments' => $this->receiptService->getApartment(),
            'months' => $this->receiptService->getMonth(),
            'years' => $this->receiptService->getYear(),
        ]);
    }

    public function status(Month $month)
    {
        $id = $month->id;
        $receipt = Receipt::where('id', '=', $id)->first();
        return view('admin.receipt.status', [
            'title' => "QUẢN LÝ TIỀN THUÊ",
            'receipt' => $receipt,
        ]);
    }

    public function update_status(Month $month, Request $request)
    {
        $id = $month->id;

        $status = $request->status;

        $receipts = Receipt::all();
        if ($receipts == true) {
            foreach ($receipts as $t => $receipt) {
                if ($receipt['id'] == $id) {
                    $receipt['status'] = $status;
                    $receipt->save();
                }
            }
            Session::flash('success', 'Cập nhật tình trạng đóng tiền thành công.');
            return redirect()->back();
        }
    }
}
