<?php

namespace App\Http\Requests\API\student;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'tel' => 'required|min:11',
            'password' => 'required|max:255',
            'password_repeat'=> 'required|same:password',
        ];

    }

    public function messages()
    {
        return[
            'tel.required'  => 'لطفا شماره تلفن خود را وارد کنید',
            'tel.min' => 'لطفا شماره تلفن خود را صحیح وارد کنید',
            'password.required' => 'لطفا رمز خود را وارد کنید',
            'password.max:255' => 'لطفا رمز خود را صحیح وارد کنید',
            'password_repeat.required' => 'لطفا تکرارا رمز را وارد کنید',
            'password_repeat.same:password' => 'رمز اشتباه است',
        ];

    }
}
