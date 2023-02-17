<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentServiceRequest extends FormRequest
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
            'department_id' => 'required',
            'service_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'department_id.required' => 'Vui lòng chọn dịch vụ',
            'service_id.required' => 'Vui lòng chọn căn hộ',
            'date_start.required' => 'Vui lòng chọn ngày bắt đầu',
            'date_end.required' => 'Vui lòng chọn ngày kết thúc',

        ];
    }
}
