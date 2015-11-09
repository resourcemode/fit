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
    protected $user;

//    public function __construct(Sentinel $sentinel)
//    {
//        $this->user = $sentinel->getUser();
//    }

    public function getUser()
    {
        return Sentinel::getUser();
    }
}