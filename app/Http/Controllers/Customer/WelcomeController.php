<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Repositories\Authentication\AuthRepository;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('email', 'michael@incube8.sg')->first();

        if (empty($user)) {
            $userInformation = [
                'email' => 'michael@incube8.sg',
                'password' => 'password',
                'first_name' => 'Michael',
                'last_name' => 'Favila'
            ];

            try {
                Sentinel::create($userInformation);
            } catch (\Exception $e) {

            }
        }


        if ($user = Sentinel::authenticateAndRemember(['email' =>'michael@incube8.sg','password' => 'password'])) {

            if (Sentinel::check()) {
                return View::make('customer.list')->with([
                    'currentUser' => $user
                ]);
            }

            abort(401);
        }

        abort(405);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
