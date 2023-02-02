<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BpApproveRequest extends FormRequest
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
                'min:10',
                'max:11',
                'unique:bps,personal_number,'.request()->segment(2),
            ],
            'blood_group' => ['nullable'],
            'education' => [
                'string'
            ],
            'father_name' => [
                'string',
                'min:3',
                'max:50',
            ],
            'mother_name' => [
                'string',
                'min:3',
                'max:50',
            ],
            'division' => [
                'string',
                'max:20',
            ],
            'district' => [
                'string',
                'max:20',
            ],
            'thana' => [
                'string',
                'max:20',
            ],
            'address' => [
                'string',
                'max:150',
            ],
            'nid' => [
                'max:17',
                'unique:bps,nid,'.request()->segment(2),
            ],
            'bank_name' => [
                'string',
                'max:50',
            ],
            'brunch_name' => [
                'string',
                'max:50',
            ],
            'account_number' => [
                'unique:bps,account_number,'.request()->segment(2),
                'max:20',
            ],
            'dob' => [
                'date',
            ],
            'status' => [],
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
