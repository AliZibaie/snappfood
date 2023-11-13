<?php

namespace App\Http\Requests\api\auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'bail|required|email|exists:users',
            'password'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'لطفا آدرس ایمیل خود را وارد نمایید.',
            'email.email' => 'لطفا آدرس ایمیل معتبر وارد نمایید.',
            'email.exists' => 'ایمیل یا پسورد شما اشتباه هست',
            'password.required' => 'لطفا پسورد خود را وارد نمایید.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'خطای اعتبارسنجی',
            'data'      => $validator->errors()
        ], 404));
    }
}
