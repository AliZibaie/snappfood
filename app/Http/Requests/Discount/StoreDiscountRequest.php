<?php

namespace App\Http\Requests\Discount;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->getRoleNames()->first() == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount'=> "bail|required|integer",
            'code'=> "bail|required|unique:discounts",
            'expire_time'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'amount.required' => 'لطفا مبلغ تخفیف را وارد نمائید',
            'amount.integer' => 'لطفا مبلغ تخفیف را به صورت عدد وارد کنید(تومان)',
            'code.required' => 'کد رو هم تولید کنید',
            'code.unique' => 'کد مورد نظر درحال حاضر استفاده شده است.',
            'expire_time.required' => 'لطفا مدت انقضا را وارد نمایید',
        ];
    }
}
