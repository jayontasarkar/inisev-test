<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyDigest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $digest;

    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($digest, $subscriber)
    {
        $this->digest = $digest;
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Daily digest email')
            ->view('emails.digest');
    }
}
