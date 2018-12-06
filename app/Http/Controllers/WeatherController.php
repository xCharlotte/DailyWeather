<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Mail\WeatherMail;
use Mail;

class WeatherController extends Controller
{  
  public function getWeatherData() {
    $plaats = Input::get('plaats'); // To get the param input from the url
    $data = $this->getApiData($plaats); // Call private function for the api data
    
    $date = Carbon::now()->formatLocalized('%A %e %B %Y');
  
    return view('index', array('data' => $data), compact('date'));
  }
  
  public function sendEmail(Request $request) {  
    $email = $request->input('email'); // Get the email input from the form in the Index view 
    $plaats = $request->input('plaats'); // Get the plaats input from the Index view 
    
    $data = $this->getApiData($plaats); 
    
    Mail::to($email)->send(new WeatherMail($data)); // Send email from the weatherMail Mailer
    return redirect('/?plaats='.$plaats); // Returns back to the 
  }
  
  private function getApiData($plaats) { // Made private function so it can't be used in other classes
    if (!isset($plaats)) {
      $plaats = 'Amsterdam'; // If plaats does not exist, choose Amsterdam
    }
    
    // Make api call 
    $client = new Client();
    $response = $client->get('http://weerlive.nl/api/json-data-10min.php?key=2a9e41a474&locatie='.$plaats);
  
    $data = $response->getBody(); // Get the body from request
    return $data = json_decode($data); // Show data in JSON
  }
}
