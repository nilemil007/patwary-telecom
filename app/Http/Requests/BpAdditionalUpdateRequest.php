<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BpAdditionalUpdateRequest extends FormRequest
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
            'user_id' => [],
            'supervisor_id' => [],
            'dd_house_id' => [],
            'stuff_id' => [
                'required',
                'between:8,10',
                'unique:bps,stuff_id,'.request()->segment(2),
            ],
            'pool_number' => [
                'required',
                'starts_with:19',
                'min:10',
                'max:11',
                'unique:bps,pool_number,'.request()->segment(2),
            ],
            'personal_number' => [
                'required',
                'min:10',
                'max:11',
                'unique:bps,personal_number,'.request()->segment(2),
            ],
            'gender' => [
                'required',
                'string',
            ],
            'blood_group' => ['required'],
            'education' => [
                'required',
                'string'
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
            'division' => [
                'required',
                'string',
                'max:20',
            ],
            'district' => [
                'required',
                'string',
                'max:20',
            ],
            'thana' => [
                'required',
                'string',
                'max:20',
            ],
            'address' => [
                'required',
                'string',
                'max:150',
            ],
            'nid' => [
                'required',
                'max:17',
                'unique:bps,nid,'.request()->segment(2),
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
            'account_number' => [
                'required',
                'unique:bps,account_number,'.request()->segment(2),
                'max:20',
            ],
            'salary' => [
                'nullable',
                'max:5',
            ],
            'dob' => [
                'required',
                'date',
            ],
            'resigning_date' => [
                'nullable',
                'date',
            ],
            'status' => [],
        ];
    }

    public function messages()
    {
        return [
            'stuff_id.required' => 'Can\'t keep it empty.',
            'stuff_id.between' => 'Must between 8-10 character.',
            'stuff_id.unique' => 'Already exist.',
        ];
    }
}
