<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class WeatherController extends Controller
{
  public function index() {
    $client = new Client();
    $response = $client->get('http://weerlive.nl/api/json-data-10min.php?key=demo&locatie=Amsterdam');
    // echo $res->getStatusCode(); // 200
    // echo $res->getBody();
    
    $xml = simplexml_load_string($response->getBody());
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    
    return view('index', compact('array'));
  }
  
  public function test() {
    $client = new Client();
    
    $response = $client->get('https://api.buienradar.nl/data/public/2.0/jsonfeed');
    
    $data = $response->getBody();
    $data = json_decode($data);
    
    return view('weather', array('data' => $data));
  }
  
  public function getWeatherData() {
    $client = new Client();
  
    $response = $client->get('http://weerlive.nl/api/json-data-10min.php?key=demo&locatie=Amsterdam');
  
    $data = $response->getBody();
    $data = json_decode($data);
    
    $date = Carbon::now()->formatLocalized('%A %e %B %Y %H:%M');
  
    return view('index', array('data' => $data), compact('date'));
  }
}
