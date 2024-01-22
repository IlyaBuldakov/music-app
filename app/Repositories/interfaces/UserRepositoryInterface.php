<?php

namespace App\Repositories\interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create($email, $password) : User;
}
