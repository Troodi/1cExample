<?php

namespace App\Rules\Api;

use Illuminate\Contracts\Validation\Rule;
use Ramsey\Uuid\Uuid;

class UuidRule implements Rule
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
    public function passes($attribute, $value)
    {
        return Uuid::isValid($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Supplied :attribute is not valid UUID!';
    }
}
