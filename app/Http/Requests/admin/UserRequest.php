<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'phone' => 'required|min:10|max:10',
            'email' => 'required|email:users,email',
            'password' => 'required|min:5',       
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.max' => 'Chiều dài số điện thoại không đúng',
            'phone.min' => 'Chiều dài số điện thoại không đúng',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email (example@gmail.com)',
            'email.unique' => 'Email đã được đăng kí',
            'password.required' => 'Vui lòng nhập passwod',
            'password.min' => 'Mật khẩu ít nhất 5 kí tự',
        ];
    }
}
