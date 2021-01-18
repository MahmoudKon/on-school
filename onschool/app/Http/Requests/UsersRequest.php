<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersRequest extends FormRequest
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
            'username' => 'required|string|min:5|max:25|unique:users,username,' . $this->id,
            'email'    => 'required|email||unique:users,email,' . $this->id,
            'phone'    => 'required|min:11|max:25|unique:users,phone,' . $this->id,
            'password' => 'min:3|max:25|confirmed|required_without:id|nullable',
            'image'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:8080',
        ];
    }
}
