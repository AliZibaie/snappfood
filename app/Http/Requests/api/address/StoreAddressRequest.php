<?php

namespace App\Http\Requests\api\address;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAddressRequest extends FormRequest
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
            'title'=>'bail|required|string|min:3|max:500',
            'address'=>'bail|required|string|min:5|max:500',
            'longitude'=>'bail|required|decimal:0,5',
            'latitude'=>'bail|required|decimal:0,5',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'لطفا عنوان را وارد نمایید',
            'title.string' => 'لطفا عنوان را بصورت رشته وارد نمایید',
            'title.min' => 'عنوان حداقل باید شامل 3 حرف باشد',
            'title.max' => 'عنوان حداکثر میتواند شامل 500 حرف باشد.',
            'address.required' => 'لطفا آدرس را وارد نمایید',
            'address.string' => 'لطفا آدرس را بصورت رشته وارد نمایید',
            'address.min' => 'آدرس حداقل باید شامل 3 حرف باشد',
            'address.max' => 'آدرس حداکثر میتواند شامل 500 حرف باشد.',
            'longitude.required' => 'لطفا طول جغرافیایی را وارد نمایید',
            'longitude.decimal' => 'لطفا طول جغرافیایی را بصورت صحیح وارد نمایید ',
            'latitude.required' => 'لطفا عرض جغرافیایی را وارد نمایید',
            'latitude.decimal' => 'لطفا عرض جغرافیایی را بصورت صحیح وارد نمایید ',
        ];
    }
}
