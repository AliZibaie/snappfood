<?php

namespace App\Http\Requests\api\profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'name'=>'string',
            'email'=>'unique:users',
            'password'=>'confirmed',
            'phone'=>'unique:users',
        ];
    }
    public function messages(): array
    {
        return  [
            'name.string' => 'نام باید بصورت رشته باشد.' ,
            'email.unique' => 'این آدرس ایمیل قبلا ثبت شده',
            'password.confirmed' => 'پسورد هایی که زدی به هم نمیخورن',
            'phone.unique' => 'این شماره همراه همواره ثبت شده.'
        ];
    }
}
