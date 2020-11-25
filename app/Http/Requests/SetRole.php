<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetRole extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'aryStatus' => 'required',
            'ary' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'aryStatus.required' => 'không được bỏ trống',
            'ary.required' => 'không được bỏ trống'
        ];
    }
}
