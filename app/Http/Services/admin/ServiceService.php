<?php

namespace App\Http\Services\admin;

use App\Models\Service;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class ServiceService
{


    public function get()
    {
        return Service::orderByDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try {
            Service::create([
                'name' => (string) $request->input('name'),
                'code' => (string) $request->input('code'),
                'price' => (integer) $request->input('price'),
                'unit' => (string) $request->input('unit'),
            ]);

            session()->flash('success', 'Tạo dịch vụ thành công');
            //dd ($request->input());
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return true;
    }


    public function update($request, $service): bool
    {
        $service->name = (string) $request->input('name');
        $service->code = (string) $request->input('code');
        $service->price = (integer) $request->input('price');
        $service->unit = (string) $request->input('unit');
        $service->save();

        Session::flash('success', 'Cập nhật thành công dịch vụ');
        return true;
    }

    public function delete($request)
    {
        $service = Service::where('id', $request->input('id'))->first();
        if ($service) {
            $service->delete();
            return true;
        }

        return false;
    }
}
