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
            'apartment_id' => 'required',
            'service_id' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'apartment_id.required' => 'Vui lòng chọn căn hộ',
            'service_id.required' => 'Vui lòng chọn dịch vụ',

        ];
    }
}
