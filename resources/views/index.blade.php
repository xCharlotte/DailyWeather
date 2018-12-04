@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h1>Daily Weather</h1>
  </div>
  
  <div class="card-body">
    <div class="card-title">
      {{ ucfirst($date) }}
      <h4>{{ $data->liveweer[0]->plaats }}</h4>
      <h5>{{ $data->liveweer[0]->verw }}</h5>
    </div>
    
    <div class="card-text">
      <div class="d-flex flex-row">
        <div class="p-2 d-flex align-items-end flex-column">
          <img src="images/{{ $data->liveweer[0]->image }}.png"></img>
        </div>
        <div class="p-2 d-flex align-items-start flex-column element-center">
          <p>{{ $data->liveweer[0]->temp }}°</p>
        </div>
      </div>
      <p>Windkracht: {{ $data->liveweer[0]->winds }}</p>
      <p>Zonsopkomst: {{ $data->liveweer[0]->sup }}</p>
      <p>Zonsondergang: {{ $data->liveweer[0]->sunder }}</p>
      <p>Windrichting: {{ $data->liveweer[0]->windr }}</p>
    </div>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Send to my Email</button>    
  </div>
</div>
<div class="container">
  <span class="text">Made possible by KNMI Weergegevens via <a href="http://www.http://weerlive.nl/">Weerlive.nl</a></span>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send this weather report to your e-mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-primary">Send now</a>
      </div>
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
  
  .flex-row {
    height: 150px;
  }
  
  .p-2 {
    width: 350px;
  }
  
  .element-center {
    font-size: 50px;
    justify-content: center;
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
  
  span {
    float: right;
    width: 50%;
  }
  
  span a {
    color: white;
  }
  
  span a:hover {
    color: #c1c1c1;
  }
  
  .text {
    color: white;
  }
  
  .card-text img {
    width: 150px;
    height: 150px;
  }
</style>