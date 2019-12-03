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
                'password'       => '$2y$10$k8MArIl217/ImG/7g28d8uy0MjipwONXNytGb./bdNn51kL.6MZGy',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
