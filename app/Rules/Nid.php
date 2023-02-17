<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Nid implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return strlen( $value ) === 13 || strlen( $value ) === 17;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'NID number should be 13 or 17 digits.';
    }
}
