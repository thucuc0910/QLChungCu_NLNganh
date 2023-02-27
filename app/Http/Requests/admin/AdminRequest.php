<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'password' => 'required|min:5',       
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email (example@gmail.com)',
            'email.unique' => 'Email đã được đăng kí',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Mật khẩu ít nhất 5 kí tự',
        ];
    }
}
