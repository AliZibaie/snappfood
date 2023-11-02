<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBannerRequest extends FormRequest
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
            'alt'=> 'bail|required|string',
            'title'=> 'bail|required|min:5|max:20',
            'image'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'alt.required' => 'لطفا نام متن جایگزین عکس را وارد نمایید.',
            'alt.string' => 'لطفا نام متن جایگزین عکس رو به صورت رشته وارد کنید',
            'title.required' => 'لطفاعنوان بنر را وارد نمایید.',
            'title.min' => 'حداقل طول عنوان باید 5 باشد',
            'title.max' => 'حداکثر طول عنوان  20 می باشد',
            'image.required' => 'لطفا عکس بنر را آپلود نمایید',
        ];
    }
}
