<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getList($pagination);

    public function getAll();

    public function find($id);

    public function update($attribute, $id);

    public function create($attribute);

    public function delete($id);
}
