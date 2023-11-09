<?php

namespace App\Http\Requests\api\address;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'bail|string|min:3|max:500',
            'address'=>'bail|string|min:5|max:500',
            'longitude'=>'bail|decimal:0,5',
            'latitude'=>'bail|decimal:0,5',
        ];
    }
    public function messages(): array
    {
        return [
            'title.string' => 'لطفا عنوان را بصورت رشته وارد نمایید',
            'title.min' => 'عنوان حداقل باید شامل 3 حرف باشد',
            'title.max' => 'عنوان حداکثر میتواند شامل 500 حرف باشد.',
            'address.string' => 'لطفا آدرس را بصورت رشته وارد نمایید',
            'address.min' => 'آدرس حداقل باید شامل 3 حرف باشد',
            'address.max' => 'آدرس حداکثر میتواند شامل 500 حرف باشد.',
            'longitude.decimal' => 'لطفا طول جغرافیایی را بصورت صحیح وارد نمایید ',
            'latitude.decimal' => 'لطفا عرض جغرافیایی را بصورت صحیح وارد نمایید ',
        ];
    }
}
