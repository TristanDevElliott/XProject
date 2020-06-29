<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$0ZlmBqELEnCQLIp5PN0lm.qtcBrygUoM2Z9TOrQbV2O7R7hAlEuFe',
                'remember_token' => null,
                'first_name'     => '',
                'last_name'      => '',
                'website'        => '',
                'api_token'      => '',
            ],
        ];

        User::insert($users);
    }
}
