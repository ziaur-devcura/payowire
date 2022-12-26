<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class new_account extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $active_code;
    public $sender;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$code,$sender,$subject)
    {
        $this->name = $name;
        $this->active_code = $code;
        $this->sender = $sender;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender,'Payowire')
        ->subject($this->subject)
        ->markdown('mail.new_account') 
        ->with([
            'name' => $this->name,
            'code' => $this->active_code,
        ]);;
    }
}
