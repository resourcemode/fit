<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer = [
            'first_name'       => 'Michael',
            'last_name'        => 'Favila',
            'email'            => 'resourcemode@yahoo.com',
            'password'         => 'password',

        ];

        try {
            $trainerUser = Sentinel::registerAndActivate($trainer);
            $trainerUser->roles()->attach(Sentinel::findRoleBySlug('customer_trainer'));
        } catch (\Exception $e) {
            // nothing to do
        }
    }
}
