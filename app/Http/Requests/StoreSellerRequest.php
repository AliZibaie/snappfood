<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSellerRequest extends FormRequest
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
            'phone'=>"required|unique:users",
        ];
    }
    public function messages(): array
    {
        return [
            'phone.required' => 'لطفا شماره همراه خود را وارد نمائید.',
            'phone.unique' => 'این شماره همراه همواره ثبت شده.',
        ];
    }
}
