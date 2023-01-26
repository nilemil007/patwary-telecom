<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BtsUpdateRequest extends FormRequest
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
            'dd_house_id' => [
                'required'
            ],

            'site_id' => [
                'required',
                'starts_with:DHK_',
                'unique:bts,site_id,'.request()->segment(2),
                'max:12',
            ],

            'bts_code' => [
                'required',
                'starts_with:DHK',
                'unique:bts,bts_code,'.request()->segment(2),
                'alpha_num',
                'max:10',
            ],

            'site_type' => [
                'required',
                'string',
                'max:8',
            ],

            'division' => [
                'required',
                'string',
                'max:15',
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

            'site_status' => [
                'required',
                'string',
                'max:10',
            ],

            'network_mode' => [
                'required',
                'string',
                'max:10',
            ],

            'address' => [
                'required',
                'string',
                'max:100',
            ],

            'latitude' => [
                'required',
//                'decimal:8,6',
            ],

            'longitude' => [
                'required',
//                'decimal:8,6',
            ],

            'two_g_on_air_date' => [
                'required',
                'date',
            ],

            'three_g_on_air_date' => [
                'required',
                'date',
            ],

            'four_g_on_air_date' => [
                'required',
                'date',
            ],

            'urban_rural' => [
                'required',
                'string',
                'max:20',
            ],

            'priority' => [
                'required',
                'string',
                'max:20',
            ],
        ];
    }
}
