<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Users\UserRepositoryInterface;

class UserService extends BaseService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repo = $userRepository;
    }
}
