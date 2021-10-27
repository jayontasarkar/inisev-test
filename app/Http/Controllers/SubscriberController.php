<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Repositories\Contracts\SubscriberRepositoryInterface;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    private $repository;

    public function __construct(SubscriberRepositoryInterface $subscriberRepo)
    {
        $this->repository = $subscriberRepo;
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:subscribers,email',
            'website_id' => 'required|exists:websites,id'
        ]);

        $subscriber = $this->repository->subscribe($request->all());

        return response()->json([
            'subscriber' => $subscriber,
            'message' => 'Subscriber created successfully!'
        ]);
    }
}
