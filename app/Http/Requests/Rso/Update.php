<?php

namespace App\Http\Requests\Rso;

use App\Rules\Nid;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed document
 */
class Update extends FormRequest
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
    public function rules(): array
    {
        return [
            'supervisor_id' => [
                'required',
            ],
            'code' => [
                'required',
                'starts_with:RS0',
                'min:6',
                'max:10',
            ],
            'routes' => [],
            'itop_number' => [
                'required',
                'starts_with:019,014',
                'numeric',
                'phone',
                'unique:rsos,itop_number,'.request()->segment(2),
            ],
            'pool_number' => [
                'required',
                'starts_with:019,014',
                'numeric',
                'phone',
                'unique:rsos,pool_number,'.request()->segment(2),
            ],
            'personal_number' => [
                'required',
                'numeric',
                'phone',
                'unique:rsos,personal_number,'.request()->segment(2),
            ],
            'rid' => [
                'required',
                'starts_with:RGAZ',
                'max:10',
                'unique:rsos,rid,'.request()->segment(2),
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
                'max:150',
            ],
            'blood_group' => [
                'required',
            ],
            'sr_no' => [
                'required',
                'starts_with:SR-',
                'unique:rsos,sr_no,'.request()->segment(2),
            ],
            'account_number' => [
                'required',
                'numeric',
                'unique:rsos,account_number,'.request()->segment(2),
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
                'digits_between:8,12',
            ],
            'market_type' => [
                'required',
                'string',
                'max:20',
            ],
            'salary' => [
                'required',
                'digits_between:4,5',
            ],
            'education' => [
                'required',
                'string',
                'max:5',
            ],
            'marital_status' => [
                'required',
            ],
            'gender' => [
                'required',
            ],
            'dob' => [
                'required',
                'date',
            ],
            'nid' => [
                'required',
                'numeric',
                new Nid,
                'unique:rsos,nid,'.request()->segment(2),
            ],
            'joining_date' => [
                'required',
                'date',
            ],
            'resigning_date' => [
                'nullable',
                'date',
            ],
            'document' => [
                'nullable',
                'mimes:pdf',
            ],
        ];
    }
}
