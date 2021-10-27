<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostPublished extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $post;

    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post, Subscriber $subscriber)
    {
        $this->post = $post;
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New post published')->view('emails.post-published');
    }
}
