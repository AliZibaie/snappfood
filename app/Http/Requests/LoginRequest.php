<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|exists:users',
            'password'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'لطفا آدرس ایمیل خود را وارد نمایید.',
            'email.exists' => 'خب اول ثبت نام کن بعد ورود رو بزن این چیه وارد کردی',
            'password.required' => 'لطفا پسورد خود را وارد نمایید.',
        ];
    }
}
