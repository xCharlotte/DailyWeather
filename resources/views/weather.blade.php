@extends('layouts.app')

@section('content')

{{-- {{ var_dump($data->forecast->fivedayforecast) }} --}}


@foreach ($data->forecast->fivedayforecast as $day)
  {{ $day->weatherdescription}} <br>
@endforeach


@endsection
