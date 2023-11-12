<?php

namespace App\Http\Requests\api\auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            'password_confirmation' => 'required|same:password',
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
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'خطای اعتبارسنجی',
            'data'      => $validator->errors()
        ]));
    }
}
