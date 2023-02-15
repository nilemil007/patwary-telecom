<?php

namespace App\Http\Requests\Rso;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalInfoUpdate extends FormRequest
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
            'personal_number' => [
                'required',
                'min:10',
                'max:11',
                'unique:rsos,personal_number,'.request()->segment(2),
            ],
            'father_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'mother_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'address' => [
                'required',
                'string',
                'max:150',
            ],
            'blood_group' => ['required'],
            'account_number' => [
                'required',
                'unique:rsos,account_number,'.request()->segment(2),
                'max:20',
            ],
            'bank_name' => [
                'required',
                'string',
                'max:50',
            ],
            'brunch_name' => [
                'required',
                'string',
                'max:50',
            ],
            'routing_number' => [
                'required',
                'max:20',
            ],
            'education' => [
                'required',
                'string'
            ],
            'marital_status' => [
                'required',
            ],
            'dob' => [
                'required',
                'date',
            ],
            'nid' => [
                'required',
                'max:17',
                'unique:bps,nid,'.request()->segment(2),
            ],
            'resigning_date' => [
                'nullable',
                'date',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
