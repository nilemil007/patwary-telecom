<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DdHouseStoreRequest extends FormRequest
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
            'cluster_name'      => ['max:30'],
            'region'            => ['max:20'],
            'code'              => ['required','max:10'],
            'name'              => ['nullable','min:3','max:100'],
            'market_status'     => ['max:100'],
            'email'             => ['email','unique:dd_houses,email,'].request()->segment(2),
            'district'          => ['max:20'],
            'address'           => ['max:150'],
            'proprietor_name'   => ['min:3','max:100'],
            'proprietor_number' => ['min:11','max:11'],
            'bts_code'          => ['starts_with:DHK','min:7','max:9'],
            'latitude'          => ['nullable','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude'         => ['nullable','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'latitude.regex'        => 'Invalid latitude value',
            'longitude.regex'       => 'Invalid longitude value',
            'bts_code.starts_with'  => 'BTS code must starts with: DHK',
        ];
    }
}
