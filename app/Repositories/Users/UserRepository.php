<?php

namespace App\Repositories\Users;

use App\Models\BookUser;
use App\Models\Book;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\User::class;
    }
}
