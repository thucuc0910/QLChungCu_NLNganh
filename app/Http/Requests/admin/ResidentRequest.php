<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ResidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'department_code' => 'required',
            'name' => 'required',
            'phone' => 'required|min:10|max:10',
            'CMND' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'birthday' => 'required|date_format:Y-m-d',
            'status' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'department' => 'Vui lòng chọn căn hộ',
            'name.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.min' => 'Số điện thoại phải đúng 10 số',
            'phone.max' => 'Số điện thoại phải đúng 10 số',
            'CMND.required' => 'Vui lòng nhập CMND hoặc CCCD',
            'status.required' => 'Vui lòng chọn chức vụ',
            'gender.required' => 'Vui lòng chọn giới tính',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'birthday' => 'Vui lòng chọn ngày sinh',
        ];
    }
}
