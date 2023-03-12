<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\admin\ReceiptService;

use App\Models\Receipt;
use App\Models\Month;
use App\Models\Year;
use App\Models\Month_receipt;
use App\Models\Apartment;
use App\Models\ApartmentService;
use App\Models\Service;
use App\Models\Resident;





use Illuminate\Cache\NullStore;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;


use Illuminate\Support\Facades\App;

use Carbon\Carbon;



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
                $data->total = $data->rent + ($data->electricity_bill * 2000) + ($data->water_bill * 8000) + $data->service_fee;
                $data->status = 0;
                $data->save();
            }
        }

        $month_receipts = Month_receipt::all();

        return view('admin.receipt.list_receipt', [
            'title' => 'QUẢN LÝ TIỀN THUÊ',
            'receipts' => $this->receiptService->getReceipt($id),
            'month_receipts' => $month_receipts,
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

    public function print_receipt($month)
    {
        $pdf = App()->make('dompdf.wrapper');
        $pdf->loadHTML($this->print_receipt_month($month));
        return $pdf->stream();
    }

    public function  print_receipt_month($month)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $date = $dt->toDateString();
        $receipts = Receipt::where('month_receipt_id','=',$month)->get();
        $apartments = Apartment::all();
        $residents = Resident::all();
        $month_receipts = Month_receipt::all();
        $months = Month::all();
        $years = Year::all();

        $apartment_services = ApartmentService::all();
        $services = Service::all();
        // dd($receipts);
        $output = '';
        foreach($receipts as $key => $receipt){
            $electricity = $receipt->electricity_bill * 2000;
            $water = $receipt->water_bill * 8000;
            $output .= '
            <style>
            body{
                font-family: DejaVu Sans;
            }
            
            thead, tbody, th, td, tr{
                border: 1px solid; 
            }
            #total{
                font-weight: bold;
            }
            
            table{
                border-collapse: collapse;
                width: 100%;
                // background-color:red;
                justify-content:between;
            }
            </style>
            <div class="col-md-12 ">
                <div style="font-size:10px">' . date("d-m-Y", strtotime($date)) . '</div>
                <div class="" style="float: left;">
                    <b style="font-size:15px">CHUNG CƯ SUNHOUSE</b>
                    <br>
                <div style="font-size:13px">Địa chỉ: Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam</div>
                <div style="font-size:13px">SĐT: <b>0773826910</b></div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <h2 class=""><center>BẢNG KÊ CHI PHÍ</center></h2>
            ';
                    foreach($month_receipts as $month_receipt){
                        if($receipt->month_receipt_id == $month_receipt->id){
                            foreach ($months as $key => $month){
                                if($month_receipt->month_id == $month->id){
                                    foreach($years as $year){
                                        if($month_receipt->year_id == $year->id){

                                $output.='
                                    <center><span>Tháng '.$month->name.'/'.$year->name.'</span></center>
                                ';
                                        }
                                    }  
                                }
                            }
                        }
                    }

               

           
            foreach($residents as $resident){
                if($receipt->apartment_id == $resident->apartment_id) {
                    $output.='
                    <div>Họ tên: '.$resident->name.'</div>
                    ';
                }  
            } 
            
            foreach($apartments as $apartment){
                if($receipt->apartment_id == $apartment->id) {
                    $output.='
                    <div>Căn hộ: '.$apartment->code.'</div>
                    ';
                }  
            } 
        
            $output .='
            <br>
            <table>
                <thead>
                    <tr class="p-t-50">
                    </tr>
                    <tr >
                        <th >Tên dịch vụ</th>
                        <th >Chỉ số đã sử dụng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody >
                
                    <tr >
                        <td>
                            Tiền nhà
                        </td>
                        <td>
                            #
                        </td>
                        <td>
                            #
                        </td>
                        <td >
                            <center>'.number_format($receipt->rent).'VNĐ</center>
                        </td>

                    </tr>
                    
                    <tr>
                        <td>
                            Điện
                        </td>
                        <td>
                            '.$receipt->electricity_bill.'(Kwh)
                        </td>
                        <td>
                            
                            '.number_format(2000).'
                        </td>
                        <td>
                            <center>'.number_format($electricity).'VNĐ</center>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Nước
                        </td>
                        <td>
                            '.$receipt->water_bill.'(m3)
                        </td>
                        <td>
                            '.number_format(8000).'
                        </td>
                        <td>
                            <center>'.number_format($water).'VNĐ</center>
                        </td>

                    </tr>';
                
                    foreach($apartment_services as $apartment_service){
                        if($receipt->apartment_id == $apartment_service->apartment_id){
                            foreach($services as $service){
                                if($service->id == $apartment_service->service_id){
                                    $output .='
                                    <tr>
                                        <td>
                                            '.$service->name.'
                                        </td>
                                        <td>
                                            #
                                        </td>
                                        <td>
                                            '.number_format($service->price).'
                                        </td>
                                        <td>
                                            <center>'.number_format($service->price).'</center>
                                        </td>

                                    </tr>';
                                }
                            }
                        }
                    }
                   
            $output .='
                    <tr>
                        <td id="total" colspan="3"> Tổng
                        </td>
                        <td id="total">
                            <center>'.number_format($receipt->total).'VNĐ</center>
                        </td>
                    
                    </tr>
                    
                    </tbody>
                </table>
                <div style="float: right;">
                    <br>
                        <div style="float: right; margin-right: 10%; font-weight: bold">Xác nhận đã thu phí</div>
                    <br>
                    <div style="float: right;">Ngày ... tháng ... năm 2023</div>
                    <br>
                    <div style="float: right; margin-right: 30%">Người nhận</div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                ';
        }
        return $output;
    }
}
