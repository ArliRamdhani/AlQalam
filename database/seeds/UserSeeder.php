<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'first_name'    => 'admin',
            'last_name'     => 'admin',
            'email'         => 'admin@openthinklabs.com',
            'password'      => Hash::make('rahasia'),
            'remember_token'=> str_random(64),
            'activated'     => true
        ));
        $user->assignRole($adminRole);

        $user = User::create(array(
            'first_name'    => 'user',
            'last_name'     => 'user',
            'email'         => 'user@openthinklabs.com',
            'password'      => Hash::make('rahasia'),
            'remember_token'=> str_random(64),
            'activated'     => true
        ));
        $user->assignRole($userRole);
    }
}