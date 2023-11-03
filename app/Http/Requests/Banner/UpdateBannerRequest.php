<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBannerRequest extends FormRequest
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
            'title' => 'required',
            'alt' => 'required',
            'image' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'alt.required' => 'لطفا نام متن جایگزین عکس را وارد نمایید.',
            'title.required' => 'لطفاعنوان بنر را وارد نمایید.',
            'image.required' => 'لطفا عکس بنر را آپلود نمایید',
        ];
    }
}
