<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class FormValidation extends FormRequest
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
            'fileToUpload' => 'required',
            // 'option' => 'required',
            // 'role' => 'required',
            'describe' => 'required',
            'name' => 'required',
            // 'quantity' => 'required',
            'price' => 'required',
            'code' => 'required',
            'ary' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fileToUpload.required' => 'Phải chọn ảnh',
            // 'role.required' => 'Không được bỏ trống !',
            'describe.required' => 'Không được bỏ trống !',
            // 'quantity.required' => 'Không được bỏ trống !',
            'price.required' => 'Không được bỏ trống !',
            'code.required' => 'Không được bỏ trống !',
            'name.required' => 'Không được bỏ trống !',
            'ary.required' => 'Không được bỏ trống !',
        ];
    }
}
