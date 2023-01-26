<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed itop_number
 */
class ItopReplaceUpdateRequest extends FormRequest
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
            'itop_number' => ['required','starts_with:019,014','digits:11'],
            'serial_number' => ['digits:18','unique:itop_replaces,serial_number,'.request()->segment(2)],
            'description' => ['max:100'],
            'reason' => ['required'],
            'balance' => ['nullable'],
            'pay_amount' => ['nullable'],
            'status' => ['nullable'],
        ];
    }
}
