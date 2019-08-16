<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Stores\StoreRepositoryInterface;

class StoreService extends BaseService
{
    private $storeRepository;

    public function __construct(StoreRepositoryInterface $storeRepository)
    {
        $this->repo = $storeRepository;
    }
}
