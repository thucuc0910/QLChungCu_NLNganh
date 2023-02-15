<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'code' => 'required',
            'floor' => 'required',
            'length' => 'required',
            'width' => 'required',
            'direction'	=> 'required',
            'status'	=> 'required',
            'description'	=> 'required',
            'price'     => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'code.required' => 'Vui lòng nhập mã căn hộ',
            'floor.required' => 'Vui lòng chọn tầng',
            'length.required' => 'Vui lòng nhập chiều dài',
            'width.required' => 'Vui lòng nhập chiều rộng',
            'direction.required' => 'Vui lòng chọn hướng',
            'status.required' => 'Vui lòng chọn tình trạng của căn hộ',
            'price.required' => 'Vui lòng nhập giá',
        ];
    }
}
