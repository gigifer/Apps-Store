@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
      @foreach ($aplicaciones as $aplicacion)
      <div class="col mb-4">
        <div class="card shadow-sm">
          <img src="{{ asset('storage').'/'.$aplicacion->picture}}" class="card-img-top" alt="..." style="height:220px">
          <div class="card-body">
            <h5 class="card-title text-center">{{$aplicacion->name}}</h5>
            <p class="card-text letra-clara">{{$aplicacion->description}}</p>
            <p class="letra">${{$aplicacion->price}}</p>
            <div class="d-flex justify-content-end">
              <a href="{{ url('detail', $aplicacion->id)}}"><button type="button" class="btn btn-primary">Detalle</button></a>
            </div>
          </div>
        </div>
      </div>
     @endforeach
    </div>
  </div>

@endsection
