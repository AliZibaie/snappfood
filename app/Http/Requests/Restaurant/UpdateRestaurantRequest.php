<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRestaurantRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'food_id' => 'required',
            'account_number' => 'required',
            'sending_price' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'image' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'لطفا نام رستوران خود را وارد نمائید.',
            'address.required' => 'لطفا آدرس رستوران خود را وارد نمائید.',
            'phone.required' => 'لطفا شماره تماس رستوران خود را وارد نمائید.',
            'food_id.required' => 'لطفا نوع غذا های رستوران خود را وارد نمائید.',
            'account_number.required' => 'لطفا شماره حساب  خود را وارد نمائید.',
            'sending_price.required' => 'لطفا هزینه ارسال محصولات رستوران خود را وارد نمائید.',
            'open_time.required' => 'لطفا ساعت باز کردن رستوران خود را وارد نمائید.',
            'close_time.required' => 'لطفا ساعت بستن رستوران خود را وارد نمائید.',
            'image.required' => 'لطفا عکس رستوران خود را وارد نمائید.',
        ];
    }
}
