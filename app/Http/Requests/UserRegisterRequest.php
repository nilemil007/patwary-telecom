<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => ['required','min:3','max:60'],
            'username'      => ['required','min:3','max:20','unique:users,username'],
            'email'         => ['required','email','unique:users,email'],
            'dd_house_id'   => ['required'],
            'role'          => ['required'],
            'password'      => ['required','min:8','max:150'],
            'image'         => ['sometimes','mimes:jpg,png,jpeg'],
        ];
    }
}
