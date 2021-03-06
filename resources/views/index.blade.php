@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h1>{{ ucfirst($date) }}</h1>
  </div>
  
  <div class="card-body">
    <div class="card-title">
      <h4>{{ $data->liveweer[0]->plaats }}
        <a href="#" data-toggle="modal" data-target="#plaats">
          <small><i class="fas fa-pencil-alt"></i></small>
        </a>
      </h4>
      <h5>{{ $data->liveweer[0]->verw }}</h5>
    </div>
    
    <div class="card-text">
      <div class="d-flex justify-content-center align-items-center">
        <div class="p-2">
          <img src="images/{{ $data->liveweer[0]->image }}.png" class="weather-img"></img>
        </div>
        <div class="p-2 temperature">
          <p>{{ $data->liveweer[0]->temp }}°</p>
        </div>
      </div>
      <p>Windkracht: {{ $data->liveweer[0]->winds }}</p>
      <p>Windrichting: {{ $data->liveweer[0]->windr }}</p>
      <div class="d-flex justify-content-center">
        <div class="mr-3 p-2">
          <img src="images/sunrise.png" class="sup-sunder"/>
        </div>
        <div class="ml-3 p-2">
          <img src="images/sunset.png" class="sup-sunder"/>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="mr-3 p-2">
          <p>{{ $data->liveweer[0]->sup }}</p>
        </div>
        <div class="ml-3 p-2">
          <p>{{ $data->liveweer[0]->sunder }}</p>
        </div>
      </div>
    </div>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Stuur naar mijn E-mail</button>    
  </div>
</div>


<!--- Modal for plaats -->
<div class="modal fade" id="plaats" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card-text">
          <form name="addres" id="addres" method="get" action="/">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Voer de plaatsnaam in" name="plaats"/>
              <div class="input-group-append">
               <input type="submit" class="btn btn-primary"/>
             </div>
           </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal for send me an email -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ook zo'n leuk weerbericht ontvangen op de mail?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="/sendemail" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="plaats" value="{{ $data->liveweer[0]->plaats }}">
        <div class="modal-body">
          <input type="email" class="form-control" name="email" placeholder="Jouw E-mail">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Verzenden</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end of Modal -->

@endsection

<style>

  body {
    background-image: url("/images/img_223.jpg");
    background-size: cover;
  }
  
  .sup-sunder {
    width: 50px;
  }
  
  .temperature {
    font-size: 50px;
    margin-top: 10px;
  }
  
  .card {
    margin: 0 auto;
    float: none;
    text-align: center;
    width: 50%;
    margin-top: 70px;
    opacity: .9;
  }
  
  .weather-img {
    width: 150px;
    height: 150px;
  }
</style>