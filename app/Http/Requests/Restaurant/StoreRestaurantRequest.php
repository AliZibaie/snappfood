<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->getRoleNames()->first() == 'seller';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'bail|required|unique:restaurants',
            'address'=>'required',
            'phone'=>'bail|required|unique:restaurants',
            'account_number'=>'bail|required|unique:restaurants',
            'sending_price'=>'required',
            'open_time'=>'required',
            'close_time'=>'required',
            'image'=>'required',
            'food_id'=>'required',
            'restaurant_category_id'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'لطفا نام رستوران خود را وارد نمائید.',
            'name.unique' => 'این نام رستوران همراه همواره ثبت شده.',
            'phone.unique' => 'این شماره تماس رستوران همراه همواره ثبت شده.',
            'phone.required' => 'لطفا شماره تماس رستوران خود را وارد نمائید.',
            'address.required' => 'لطفا آدرس رستوران خود را وارد نمائید.',
            'account_number.required' => 'لطفا شماره حساب خود را وارد نمائید.',
            'account_number.unique' => 'این شماره حساب همواره ثبت شده.',
            'sending_price.required' => 'لطفا هزینه ارسال سفارشات را وارد نمائید.',
            'open_time.required' => 'لطفا ساعت شروع رستوران خود را وارد نمائید.',
            'close_time.required' => 'لطفا ساعت پایان رستوران خود را وارد نمائید.',
            'image.required' => 'لطفا عکس رستوران خود را وارد نمائید.',
            'food_id.required' => 'لطفا نوع غذا های رستوران خود را وارد نمائید.',
            'restaurant_category_id.required' => 'لطفا نوع رستوران خود را وارد نمائید.',
        ];
    }
}
