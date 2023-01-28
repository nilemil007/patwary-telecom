<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BpProfileUpdateRequest extends FormRequest
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
            'image' => [
                'sometimes',
                'mimes:jpg,jpeg,png'
            ],
            'username' => [
                'required',
                'string',
                'min:3',
                'max:20',
            ],
            'email' => [
                'required',
                'email',
            ],
        ];
    }

    public function messages()
    {
        return [
            'image.required' => ['Image is required.'],
            'username.required' => ['Username is required.'],
            'username.min' => ['Minimum 3 character or more.'],
            'username.max' => ['Maximum 20 character.'],
            'email.required' => ['Email is required.'],
        ];
    }
}
