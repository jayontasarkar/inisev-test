<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\NewPostPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToSubscribers implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        $this->post->load('subscribers');
        $subscribers = $this->post->subscribers;
        foreach($subscribers as $subscriber)
        {
            Mail::to($subscriber->email)->queue(new NewPostPublished($this->post, $subscriber));
        }
    }
}
