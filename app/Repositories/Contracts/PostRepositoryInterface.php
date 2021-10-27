<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function all();
    public function find($attributes);
    public function create($attributes);
    public function update($id, $attributes);
    public function delete($id);
}
