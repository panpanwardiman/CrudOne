<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            $name = 'required|max:100|unique:books,name,'.$this->segment(2);
        } else {
            $name = 'required|max:100|unique:books,name';
        }

        return [
            'name' => $name,
            'author' => 'required|max:50',
            'publisher' => 'required|max:100',
            'price' => 'required|numeric',
            'cover' => 'sometimes|image|mimes:jpg,jpeg,png',
        ];
    }
}
