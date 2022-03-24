<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Modules\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $items;
    protected $path;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($items, $path, $user)
    {
        $this->items = $items;
        $this->path = $path;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $manager = User::where('role_id', 1)->first();
        Mail::to($manager->email ?: 'default@i.ua')->send(new SendMail($this->items, $this->path, $this->user));

    }
}
