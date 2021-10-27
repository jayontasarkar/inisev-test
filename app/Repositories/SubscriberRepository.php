<?php

namespace App\Repositories;

use App\Repositories\Contracts\SubscriberRepositoryInterface;

class SubscriberRepository implements SubscriberRepositoryInterface
{
    private function model()
    {
        return new \App\Models\Subscriber();
    }

    public function subscribe($attributes)
    {
        return $this->model()->create($attributes);
    }
}
