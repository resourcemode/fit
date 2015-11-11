<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class CustomerRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'        => 'Trainer',
                'slug'        => 'customer_trainer',
                'permissions' => [
                    'customer_trainer' => true,
                ]
            ],
            [
                'name'        => 'Trainee',
                'slug'        => 'customer_trainee',
                'permissions' => [
                    'customer_trainee' => true,
                ]
            ],
            [
                'name'        => 'Administrator',
                'slug'        => 'admin',
                'permissions' => [
                    'admin' => true,
                ]
            ],
        ];

        // populate all roles
        foreach ($roles as $role) {
            // populate all roles
            foreach ($roles as $role) {
                try {
                    Sentinel::getRoleRepository()->createModel()->fill($role)->save();
                } catch (\Exception $e) {
                    // Ignore, role already created
                }
            }
        }
    }
}
