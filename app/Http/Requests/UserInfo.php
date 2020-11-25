<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfo extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
            'Address' => 'required',
            'City' => 'required',
            'State' => 'required',
            'Zip' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fileToUpload.required' => 'Phải chọn ảnh',
            'email.required' => 'Phải chọn ảnh',
            'password.required' => 'Phải chọn ảnh',
            'Address.required' => 'Phải chọn ảnh',
            'City.required' => 'Phải chọn ảnh',
            'State.required' => 'Phải chọn ảnh',
            'Zip.required' => 'Phải chọn ảnh'
        ];
    }
}
