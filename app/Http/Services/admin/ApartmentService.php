<?php

namespace App\Http\Services\admin;

use App\Models\Apartment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class ApartmentService
{

    public function get(){
        return Apartment::orderBy('id')->paginate(15);
    }

    public function create($request)
    {
        // $pass=Hash::make($request->password);
        try {
            Apartment::create([
                'code' => (string) $request->input('code'),
                'floor' => (integer) $request->input('floor'),
                'length' => (double) $request->input('length'),
                'width' => (double) $request->input('width'),
                'direction' => (string) $request->input('direction'),
                'status' => (integer) $request->input('status'),
                'price' => (integer) $request->input('price'),
                'description' => (string) $request->input('description'),
            ]);
 
            session()->flash('success', 'Tạo căn hộ thành công');
             //dd ($request->input());
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }
 
         return true;
    }

    public function update($request, $apartment): bool
    {
        // dd($apartment->email);
        $apartment->code = (string)$request->input('code');
        $apartment->floor = (integer)$request->input('floor');
        $apartment->length = (double)$request->input('length');
        $apartment->width= (double)$request->input('width');
        $apartment->description = (string)$request->input('description');
        $apartment->status = (integer)$request->input('status');
        $apartment->direction = (string)$request->input('direction');
        $apartment->save();

        Session::flash('success', 'Cập nhật thành công căn hộ');
        return true;
    }

    public function delete($request)
    {
        $apartment = Apartment::where('id', $request->input('id'))->first();
        if ($apartment) {
            $apartment->delete();
            return true;
        }

        return false;
    }

    public function getApartment()
    {
        return Apartment::where('status' , '>=', 0)->get();
    }

    
}