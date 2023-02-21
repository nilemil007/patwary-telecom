<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed joining_date
 */
class SupervisorUpdateRequest extends FormRequest
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
            'pool_number' => [
                'required',
                'digits:11',
            ],
            'personal_number' => [
                'required',
                'digits:11',
            ],
            'father_name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'mother_name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'division' => [
                'required',
                'string',
                'min:3',
                'max:20',
            ],
            'district' => [
                'required',
                'string',
                'min:3',
                'max:20',
            ],
            'thana' => [
                'required',
                'string',
                'min:3',
                'max:20',
            ],
            'address' => [
                'required',
                'string',
                'min:3',
                'max:150',
            ],
            'nid' => [
                'nullable',
                'numeric',
            ],
            'dob' => [
                'required',
                'date',
            ],
            'joining_date' => [
                'nullable',
                'date',
            ],
            'resigning_date' => [
                'nullable',
                'date'
            ],
        ];
    }
}
