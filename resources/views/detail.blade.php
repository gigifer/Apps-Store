@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-sm-12 col-md-7 col-lg-7">
    <img src="{{ asset('img\mini_puppy.png') }}" class="card-img-top" width="250" height="350" alt="foto">
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
      <h5>nombre</h5>
      <p>descripcion</p>
  <br>
    <p>Precio: $ 1000 </p>
    <br>
    <div>
      <a href="#"><button type="button" class="btn">Agregar al carrito</button></a>

    </div>

    </div>
  </div>

@endsection
