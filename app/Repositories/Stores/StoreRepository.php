<?php

namespace App\Repositories\Stores;

use App\Models\Store;
use App\Repositories\Stores\StoreRepositoryInterface;
use App\Repositories\EloquentRepository;
use Auth;

class StoreRepository extends EloquentRepository implements StoreRepositoryInterface
{
    // protected $model;
    // public function __construct()
    // {
    //     $this->model = $this->_model->with('user');
    // }
    public function getModel()
    {
        return \App\Models\Store::class;
    }

    public function getList($pagination)
    {
        return $this->_model->with('user')->paginate($pagination);
    }
    
    public function update($id, $attributes)
    {
        $result = $this->_model->find($id);
        if ($result) {
            $result->update($attributes);
            $updated = $this->_model->with('user')->find($id);
            return $updated;
        }
        return null;
    }
}
