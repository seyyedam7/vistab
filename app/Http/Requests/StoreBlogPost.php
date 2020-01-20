<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'name' => 'required|min:4',
            'tel' => 'required|min:11',
            'password' => 'required|max:255',
            'password_repeat'=> 'required|same:password',
            'image_path' => 'nullable',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'لطقا نام خود را وارد کنید',
            'name.min' => 'لطفا اسم خود را صحیح وارد کنید',
            'tel.required'  => 'لطفا شماره تلفن خود را وارد کنید',
            'tel.min' => 'لطفا شماره تلفن خود را صحیح وارد کنید',
            'password' => '',

        ];
    }
}
