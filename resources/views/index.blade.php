@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h1>Daily Weather</h1>
  </div>
  
  <div class="card-body">
    <div class="card-title">
      <h4>{{ $data->liveweer[0]->plaats }}</h4>
      <h5>{{ $data->liveweer[0]->verw }}</h5>
    </div>
    
    <div class="card-text">
      <div class="row">
        <div class="col-md-6">
          <img src="images/{{ $data->liveweer[0]->image }}.png"></img>
        </div>
        <div class="col-md-6 align-middle">
          <p>{{ $data->liveweer[0]->temp }}°</p>
        </div>
      </div>
      <p>Windkracht: {{ $data->liveweer[0]->winds }}</p>
      <p>Zonsopkomst: {{ $data->liveweer[0]->sup }}</p>
      <p>Zonsondergang: {{ $data->liveweer[0]->sunder }}</p>
      <p>Windrichting: {{ $data->liveweer[0]->windr }}</p>
    </div>
    
    <a href="#" class="btn btn-primary">Send to my Email</a>
  </div>
</div>
<div class="container">
  <span class="text">Made possible by KNMI Weergegevens via Weerlive.nl</span>
</div>


@endsection

<style>

  body {
    background-image: url("/images/img_223.jpg");
    background-size: cover;
  }
  
  .col-md-6 p {
    font-size: 40px;
  }
  .card {
    margin: 0 auto;
    float: none;
    text-align: center;
    width: 50%;
    margin-top: 70px;
    opacity: .9;
  }
  
  span {
    float: right;
    width: 50%;
  }
  
  .text {
    color: white;
  }
  
  .card-text img {
    width: 150px;
    height: 150px;
  }
</style>