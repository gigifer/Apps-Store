@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="card border-info mb-3" style="width: 18rem;">
    <img src="{{ asset('img\mini_puppy.png') }}" class="card-img-top" height="250" alt="foto">
    <div class="card-body ">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="{{ url('detail')}}" class="btn btn-primary">Detalle</a>
    </div>
  </div>
@endsection
