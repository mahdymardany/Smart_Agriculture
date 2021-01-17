<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'نام و نام خانوادگی باید وارد شود',
//            'username.required' => 'نام کاربری باید وارد شود',
//            'password_confirmation.same' => 'رمز های عبور یکسان نمباشند'
        ];
    }
}
