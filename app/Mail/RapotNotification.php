<?php

namespace App\Mail;

use App\Models\Rapot;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RapotNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $rapot;

    public function __construct($rapot)
    {
        $this->rapot = $rapot;
    }

    public function build()
    {
        return $this->subject('Data Rapot Baru')
                    ->view('emails.rapot');
    }
}