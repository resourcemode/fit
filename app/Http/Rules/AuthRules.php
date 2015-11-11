<?php
/**
 * Auth Rules
 *
 * @author     Michael <resourcemode@yahoo.com>
 */

namespace App\Http\Rules;


class AuthRules
{
    public static function getRules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    public static function getMessage()
    {
        return [
            'email.unique' => 'Email already in use',
            'email.required' => 'Required field',
            'password.required' => 'Required field',
        ];
    }
}