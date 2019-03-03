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

        if ($this->method() == 'PATCH') {
            $email = 'required|max:150|unique:users,email,'.$this->id;
        } else {
            $email = 'required|max:150|unique:users,email';
        }

        return [
            'name' => 'required|max:150',
            'email' => $email,
            'password' => 'required|min:8|same:password_confirm',
            'password_confirm' => 'required|min:8|same:password',
            'gender' => 'required',
            'level' => 'required'
        ];
    }
}
