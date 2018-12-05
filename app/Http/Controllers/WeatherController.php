<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class WeatherController extends Controller
{  
  public function getWeatherData() {
    $plaats = Input::get('plaats');
    if (!isset($plaats)) {
      $plaats = 'Amsterdam'; 
    }
    
    $client = new Client();
    $response = $client->get('http://weerlive.nl/api/json-data-10min.php?key=2a9e41a474&locatie='.$plaats);
  
    $data = $response->getBody();
    $data = json_decode($data);
    
    $date = Carbon::now()->formatLocalized('%A %e %B %Y');
  
    return view('index', array('data' => $data), compact('date'));
  }
}
