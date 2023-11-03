<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFoodRequest extends FormRequest
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
            'name'=>'required',
            'foodCategory_id'=>'required',
            'price'=>'bail|required|integer',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'لطفا نام غذا را وارد نمائید.',
            'foodCategory_id.required' => 'لطفا دسته بندی غذا را وارد نمائید.',
            'price.required' => 'لطفاهزینه غذا را وارد نمائید.',
            'price.integer' => 'لطفاهزینه غذا را به صورت عدد وارد نمائید.',
        ];
    }
}
