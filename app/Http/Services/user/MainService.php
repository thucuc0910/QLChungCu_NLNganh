<?php

namespace App\Http\Services\user;

use App\Models\User;
use App\Models\Resident;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Month;
use App\Models\year;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class MainService{

    public function get(){
        return User::orderBy('id')->paginate(15);
    }

    public function getResident(){
        return Resident::all();
    }

    public function getApartmentAll(){
        return Apartment::all();
    }

    public function getService()
    {
        return Service::all();
    }

    public function getMonth()
    {
        return Month::all();
    }

    public function getYear()
    {
        return Year::all();
    }

    
}