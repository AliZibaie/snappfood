<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFoodCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return Auth::user()->getRole() === 'admin';
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
            'food_type'=>'required|string|unique:food_categories',
        ];
    }
    public function messages(): array
    {
        return [
            'food_type.required' => 'لطفا نام دسته بندی غذا را وارد نمایید.',
            'food_type.string' => 'لطفا نام دسته بندی غذا را به صورت رشته وارد نمایید.',
            'food_type.unique' => 'دسته بندی مورد نظر درحال حاضر وجود دارد!',
        ];
    }
}
