<?php

namespace App\Console\Commands;

use App\Mail\DailyDigest;
use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyDigest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily-digest:send {website}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily digest emails to website subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $websiteId = $this->argument('website');
        $digest['count'] = 10;
        $subscribers = Subscriber::where('website_id', $this->argument('website'))->get();
        foreach($subscribers as $subscriber)
        {
            Mail::to($subscriber->email)
                ->queue(new DailyDigest($digest, $subscriber));
        }
    }
}
