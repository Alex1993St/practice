<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $items;
    protected $path;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items, $path, $user)
    {
        $this->items = $items;
        $this->path  = $path;
        $this->user  = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('new message')
                    ->view('mail.message', [
                        'items' => $this->items,
                        'path'  => $this->path,
                        'user'  => $this->user,
                    ]);
    }
}
