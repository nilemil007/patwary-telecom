<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
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
            'username'      => ['required','min:3','max:20','unique:users,username,'.request()->segment(2)],
            'email'         => ['required','email','unique:users,email,'.request()->segment(2)],
            'dd_house_id'   => ['nullable'],
            'role'          => ['required'],
            'password'      => ['nullable','min:8','max:150'],
            'image'         => ['sometimes','image','mimes:jpg,png,jpeg'],
            'status'        => ['nullable','boolean'],
        ];
    }
}
