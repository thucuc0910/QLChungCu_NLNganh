<?php

namespace App\Http\Services\admin;

use App\Models\Receipt;
use App\Models\Month_receipt;
use App\Models\Month;
use App\Models\Year;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\ApartmentService;
use App\Models\Electricity;
use App\Models\Water;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;


class ReceiptService{

    public function getReceipt($id)
    {
        $a = $id;
        return    Receipt::where('month_receipt_id','=',$a)->get();
            
    }
    public function get()
    {
        return Receipt::All();
    }
    public function getReceiptMonth()
    {
        return Month_receipt::All();
    }
    public function getReceiptMonthLast()
    {
        return Month_receipt::latest('id')->first();
    }
    public function getMonth()
    {
        return Month::All();
    }
    public function getYear()
    {
        return Year::All();
    }

    public function getApartmentRent()
    {
        return Apartment::where('status','=','1')->get();
    }

    public function getApartment()
    {
        return Apartment::all();
    }

    public function getElectricityPrice($id){
        $data = Electricity::latest('apartment_id','=',$id)->get();
        
        $electricity_bill = 0;

        foreach($data as $a){
            $electricity_bill = ($a->new - $a->old) * 2000;
        }

        return $electricity_bill;
    }

    public function getWaterPrice($id){
        $data = Water::latest('apartment_id','=',$id)->get();


        $water_bill = 0;

        foreach($data as $a){
            $water_bill = ($a->new - $a->old) * 8000;
        }

        return $water_bill;
    }

    public function getServicePrice($id){

        $data = ApartmentService::where('apartment_id','=',$id)->get();


        $service_fee = 0;

        foreach($data as $da){
            $service_id =  $da->service_id;
            $services = Service::where('id','=',$service_id)->get();
            
            foreach($services as $service){
                $service_fee = $service_fee + $service->price;
            }
        }

        return $service_fee;
    }
     
}