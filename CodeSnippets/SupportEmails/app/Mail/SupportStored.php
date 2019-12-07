<?php

namespace App\Mail;

use App\Http\Requests\StoreSupport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportStored extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The request instance.
     *
     * @var \App\Http\Requests\StoreSupport
     */
    public $request;

    /**
     * Create a new message instance.
     *
     * @param  \App\Http\Requests\StoreSupport  $request
     * @return void
     */
    public function __construct(StoreSupport $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(config('mail.from.address'), config('mail.from.name'))
                    ->replyTo($this->request->email, $this->request->name)
                    ->subject(__('messages.support.subject', $this->request->name))
                    ->view('emails.support');
    }
}
