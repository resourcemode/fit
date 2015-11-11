<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Rules\AuthRules;
use App\Repositories\Authentication\AuthRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Laracasts\Flash\Flash;

class AuthController extends Controller
{
    /**
     * Instantiate/Inject Dependencies
     *
     * @param AuthRules $authRules
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRules $authRules, AuthRepository $authRepository)
    {
        $this->authRules = $authRules;
        $this->authRepository = $authRepository;
    }

    /**
     * Get the authentication page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getAuth()
    {
        if (Sentinel::check()) {
            return redirect()->route('getWelcome');
        }

        return view('customer.auth.login');
    }

    /**
     * Process the authentication
     *
     * @param Request $request
     * @return mixed
     */
    protected function postAuth(Request $request)
    {
        $formData = $request->all();

        $validator = Validator::make($formData, $this->authRules->getRules(), $this->authRules->getMessage());

        if ($validator->fails())  {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $this->authRepository->login($formData);

            return redirect('/welcome');

        } catch (NotActivatedException $e) {
            $errorMessage = 'Account is not activated!';
            return Redirect::to('reactivate')->with([
                'user' => $e->getUser(),
                'errors' => $errorMessage
            ]);
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $errorMessage = "Your account is blocked for {$delay} second(s).";
        }

        $errorMessage = 'Invalid login or password.';

        return Redirect::back()
            ->withInput()
            ->withErrors(['errors' => $errorMessage]);
    }

    public function getLogout()
    {
        if (Sentinel::check()) {
            $this->authRepository->logout();

            Flash::success('Log out successfully!');

            return Redirect::route('getAuth');
        }

        return Redirect::route('getAuth');
    }
}
