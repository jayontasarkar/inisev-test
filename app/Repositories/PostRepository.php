<?php

namespace App\Repositories;

use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    private function model()
    {
        return new \App\Models\Post();
    }

    public function all()
    {
        return $this->model()->latest()->get();
    }

    public function find($id)
    {
        return $this->model()->find($id);
    }

    public function create($attributes)
    {
        return $this->model()->create($attributes);
    }

    public function update($id, $attributes)
    {
        return $this->model()->where('id', $id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model()->delete($id);
    }
}
