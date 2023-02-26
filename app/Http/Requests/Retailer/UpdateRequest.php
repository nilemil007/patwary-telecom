<?php

namespace App\Http\Requests\Retailer;

use App\Rules\Nid;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'dd_house_id' => [],
            'user_id' => [],
            'supervisor_id' => [],
            'rso_id' => [],
            'retailer_code' => [
                'sometimes',
                'starts_with:R',
                'min:7',
                'max:7',
                'unique:retailers,retailer_code,'.request()->segment(2),
            ],
            'retailer_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'retailer_type' => [
                'required',
                'string',
                'max:15',
            ],
            'service_point' => [
                'sometimes',
                'string',
            ],
            'owner_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'contact_no' => [
                'required',
                'numeric',
                'phone',
                'unique:retailers,contact_no,'.request()->segment(2),
            ],
            'district' => [
                'sometimes',
                'string',
                'min:3',
                'max:20',
            ],
            'thana' => [
                'sometimes',
                'string',
                'min:3',
                'max:20',
            ],
            'address' => [
                'required',
                'string',
                'max:150',
            ],
            'nid' => [
                'required',
                'numeric',
                new Nid,
                'unique:retailers,nid,'.request()->segment(2),
            ],
            'trade_license_no' => [],
            'latitude' => ['nullable','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude' => ['nullable','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'device_name' => [
                'nullable',
                'string',
                'max:50',
            ],
            'device_sn' => [
                'nullable',
                'string',
                'max:100',
            ],
            'scanner_sn' => [
                'nullable',
                'string',
                'max:100',
            ],
            'password' => [
                'nullable',
                'min:4',
                'max:6',
            ],
            'others_operator' => [],
            'enabled' => [],
            'sim_seller' => [],
            'own_shop' => [],
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
