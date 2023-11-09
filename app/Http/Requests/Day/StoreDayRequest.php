<?php

namespace App\Http\Requests\Day;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDayRequest extends FormRequest
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
            'day'=>'required',
            'open'=>'required',
            'close'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'day.required' => 'لطفا روز  رستوران خود را وارد نمائید.',
            'open.required' => 'لطفا ساعت شروع  رستوران خود را وارد نمائید.',
            'close.required' => 'لطفا ساعت پایان  رستوران خود را وارد نمائید.',
        ];
    }
}
