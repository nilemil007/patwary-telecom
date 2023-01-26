<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetitionInformationStoreRequest extends FormRequest
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
            'cluster' => [],
            'region' => [],
            'dd_code' => [],
            'retailer_code' => [],
            'rso_number' => [],
            'retailer_number' => ['required','unique:competition_information,retailer_number'],
            'bl_c2s' => [],
            'gp_c2s' => [],
            'robi_c2s' => [],
            'airtel_c2s' => [],
            'bl_ga' => [],
            'gp_ga' => [],
            'robi_ga' => [],
            'airtel_ga' => [],
        ];
    }
}
