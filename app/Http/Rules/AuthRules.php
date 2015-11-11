<?php
/**
 * Auth Rules
 *
 * @author     Michael <resourcemode@yahoo.com>
 */

namespace App\Http\Rules;

/**
 * Class AuthRules
 */
class AuthRules
{
    /**
     * List of auth rules
     *
     * @return array
     */
    public static function getRules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * List of auth custom error messages
     *
     * @return array
     */
    public static function getMessage()
    {
        return [
            'email.unique' => 'Email already in use',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }
}