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
            'email'=>'required|email|unique:users',
            'password'=>["required", Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(2)],
            'password_confirmation' => 'required|same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'لطفا نام خود را وارد نمایید.',
            'email.email' => 'لطفا آدرس ایمیل معتبر وارد نمایید.',
            'email.unique' => 'این آدرس ایمیل قبلا ثبت شده',
            'email.required' => 'لطفا آدرس ایمیل خود را وارد نمایید.',
            'password.required' => 'لطفا پسورد خود را وارد نمایید.',
            'password.min' => 'کمترین مقدار پسورد شما 8 باید باشد',
            'password_confirmation.required' => 'کمترین مقدار پسورد شما 8 باید باشد',
            'password_confirmation.same' => 'کمترین مقدار پسورد شما 8 باید باشد',
//            'password.contains:letters' => 'لطفا پسورد خود را وارد نمایید.',
//            'password.mix' => 'لطفا پسورد خود را وارد نمایید.',
//            'password.integer' => 'لطفا پسورد خود را وارد نمایید.',
//            'password.symbols' => 'لطفا پسورد خود را وارد نمایید.',
//            'password.uncompromised' => 'پسورد هایی که زدی به هم نمیخورن',
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
