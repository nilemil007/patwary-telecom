<?php

namespace App\Http\Requests\Retailer;

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
            'user_id' => [],
            'retailer_code' => [],
            'retailer_name' => [],
            'retailer_type' => [],
            'rso_id' => [],
            'service_point' => [],
            'owner_name' => [],
            'contact_no' => [],
            'district' => [],
            'thana' => [],
            'address' => [],
            'nid' => [],
            'trade_license_no' => [],
            'latitude' => [],
            'longitude' => [],
            'device_name' => [],
            'device' => [],
            'scanner' => [],
            'password' => [],
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
