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
     * @param array $credentials
     * @return object|\Exception
     */
    public function login(array $credentials)
    {
        $remember = (bool) $credentials['remember'];

        return Sentinel::authenticate($credentials, $remember);
    }

    /**
     * @return object user
     */
    public function getUser()
    {
        return Sentinel::getUser();
    }
}