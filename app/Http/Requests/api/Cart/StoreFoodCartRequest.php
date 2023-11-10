<?php

namespace App\Http\Requests\api\Cart;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFoodCartRequest extends FormRequest
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
            'id'=>'required:exists:foods',
            'count'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'id.required'=>'لطفا ایدی غذا را وارد نمائید',
            'id.exists'=>'لطفا یک آیدی معتبر وارد نمائید',
            'count.required'=>'لطفا تعداد غذا را وارد نمایید',
        ];
    }
}
