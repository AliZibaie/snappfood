<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'لطفا نام خود را وارد نمایید.',
            'email.unique' => 'این آدرس ایمیل قبلا ثبت شده',
            'email.required' => 'لطفا آدرس ایمیل خود را وارد نمایید.',
            'password.required' => 'لطفا پسورد خود را وارد نمایید.',
            'password.confirmed' => 'پسورد هایی که زدی به هم نمیخورن',
        ];
    }
}
