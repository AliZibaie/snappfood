<?php

namespace App\Http\Requests\Discount;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->getRoleNames()->first() == 'admin';
    }

    public function rules(): array
    {
        return [
            'amount'=> "bail|required|integer",
            'code'=> "required",
            'expire_time'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'amount.required' => 'لطفا مبلغ تخفیف را وارد نمائید',
            'amount.integer' => 'لطفا ملبغ تخفیف را به صورت عدد وارد کنید(تومان)',
            'code.required' => 'کد رو هم تولید کنید',
            'expire_time.required' => 'لطفا مدت انتقضا را وارد نمایید',
        ];
    }
}
