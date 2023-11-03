<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRestaurantCategoryRequest extends FormRequest
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
            'restaurant_type'=>'required|string|unique:restaurant_categories',
        ];
    }
    public function messages(): array
    {
        return [
            'restaurant_type.required' => 'لطفا نام دسته بندی رستوران را وارد نمایید.',
            'restaurant_type.string' => 'لطفا نام دسته بندی رستوران را به صورت رشته وارد نمایید.',
            'restaurant_type.unique' => 'دسته بندی مورد نظر درحال حاضر وجود دارد!',
        ];
    }
}
