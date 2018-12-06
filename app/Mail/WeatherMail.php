<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeatherMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $address  = 'Charlottevoskuilen@hotmail.com';
      $subject  = 'Dit is een test';
      $name     = 'Charlotte';
      
      return $this->view('mails.weather_email')
                  ->from($address, $name)
                  ->cc($address, $name)
                  ->bcc($address, $name)
                  ->replyTo($address, $name)
                  ->subject($subject)
                  ->with([ 'body' => $this->data['body'] ]);
    }
}
