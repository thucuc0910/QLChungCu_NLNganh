<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'content' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'content.required' => 'Vui nhập nội dung cần góp ý',
        ];
    }
}
