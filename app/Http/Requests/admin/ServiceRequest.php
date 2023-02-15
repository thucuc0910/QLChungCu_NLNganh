<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'code' => 'required',
            'price' => 'required',
            'unit' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập tên dịch vụ',
            'code.required' => 'Vui lòng nhập mã dịch vụ',
            'price.required' => 'Vui lòng nhập giá dịch vụ',
            'unit.required' => 'Vui lòng nhập đơn vị',
        ];
    }
}
