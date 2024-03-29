@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-7 col-lg-7 mt-5">
        <img src="{{ asset('storage').'/'.$aplicacion->picture}}" class="card-img-top" width="200" height="300" alt="foto">
      </div>
      <div class="col-sm-12 col-md-5 col-lg-5 mt-5">
        <h5><strong>{{$aplicacion->name}}</strong></h5>
        <br>
        <p>Descripción:</p>
        <p>{{$aplicacion->description}}</p>
        <br>
        <p>Precio: $ {{$aplicacion->price}} </p>
        <br>
        <p>Categoría: {{$aplicacion->category->name}}</p>
        <div>
          <a class="btn btn-warning" href="{{ url('me/application/' . $aplicacion->id . '/edit') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
        </div>
        <div class="mt-3">
          <a href="{{ url('me/application') }}" title="Back"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection
