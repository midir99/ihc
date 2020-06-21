<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class old_password implements Rule
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
        //# Verificar el password ingresado y el original del usuario
        if(password_verify($value, auth()->user()->password))
            return true;
        else
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La contraseña anterior es incorrecta';
    }
}
