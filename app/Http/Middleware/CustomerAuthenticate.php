<?php
namespace App\Http\Middleware;

use App\Repositories\Authentication\AuthRepository;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class CustomerAuthenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Auth Repository is the class that handle all authentication of customers, admins and other devices
     *
     * @var AuthRepository
     */
    protected $authRepository;

    /**
     * Instantiate/Inject Dependencies
     *
     * @param Guard $auth
     * @param AuthRepository $authRepository
     */
    public function __construct(Guard $auth, AuthRepository $authRepository)
    {
        $this->auth = $auth;
        $this->authRepository = $authRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->authRepository->getUser();

        if (empty($user)) {
            return redirect()->route('getAuth');
        }

        // make sure customer has access and proper role
        foreach(Config::get('customer.list_allowed_roles') as $customer) {
            if ($user->inRole($customer)) {
                View::share('loggedInUser', $user);
                View::share('role', $customer);

                return $next($request);
            }
        }

        // redirect to 401 page
        abort(401, 'Unauthorized Access');

        return redirect()->back();
    }
}
