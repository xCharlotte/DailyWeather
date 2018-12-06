<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeatherMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data; // Variable for the entire class

    public function __construct($data) { // Receive incoming variable data
      $this->data = $data; // Set received data in class variable
    }

    public function build() {
      $address  = 'info@dailyweather.nl';
      $subject  = "Het weer van vandaag. 'Oant moarn!' ";
      $name     = 'Daily Weather';
      
      return $this->view('mails.weather_email')
                  ->from($address, $name)
                  ->subject($subject)
                  ->with([ 'data' => $this->data ]);
    }
}
