<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:users,email',
            'CMND' => 'required',
            'position' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'birthday' => 'required|date_format:Y-m-d',

        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã được đăng kí',
            'CMND.required' => 'Vui lòng nhập CMND hoặc CCCD',
            'position.required' => 'Vui lòng chọn chức vụ',
            'gender.required' => 'Vui lòng chọn giới tính',
            'city.required' => 'Vui lòng chọn thành phố',
            'district.required' => 'Vui lòng chọn quận/huyện',
            'ward.required' => 'Vui lòng chọn xã/phường',
            'birthday' => 'Vui lòng chọn ngày sinh',
        ];
    }
}
