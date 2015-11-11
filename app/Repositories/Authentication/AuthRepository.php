<?php
/**
 * Auth Repository
 *
 * @author     Michael <resourcemode@yahoo.com>
 */

namespace App\Repositories\Authentication;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AuthRepository
{
    /**
     * Authenticate user credentials
     *
     * @param array $credentials
     * @return object|\Exception
     */
    public function login(array $credentials)
    {
        $remember = (bool) $credentials['remember'];

        return Sentinel::authenticate($credentials, $remember);
    }

    /**
     * Log out the current logged in user
     *
     * @return boolean
     */
    public function logout()
    {
        return Sentinel::logout();
    }

    /**
     * Get the logged in user
     *
     * @return object user
     */
    public function getUser()
    {
        return Sentinel::getUser();
    }
}