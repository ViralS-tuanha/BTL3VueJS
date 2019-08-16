<?php

namespace App\Services;

abstract class BaseService
{
    public $repo;

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function getList($paginated)
    {
        return $this->repo->getList($paginated);
    }

    public function store(array $input)
    {
        return $this->repo->create($input);
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function update($id, array $input)
    {
        return $this->repo->update($id, $input);
    }

    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}
