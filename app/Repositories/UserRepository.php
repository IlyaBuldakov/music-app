<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function create($email, $password): User
    {
        return User::create([
            'email' => $email,
            'password' => $password
        ]);
    }
}
