@extends('layouts.app')

@section('content')
<div class="container">

  <h1 id="comida" class="text-center" style="color:blue; font-size:2rem;">Aplicaciones de Comida</h1>
  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
    @foreach ($apps_comida as $aplicacion)
      @if ($aplicacion->deleted == 0)
        <div class="col mb-4">
          <div class="card shadow-sm">
            <img src="{{ asset('storage').'/'.$aplicacion->picture}}" class="card-img-top" alt="..." style="height:220px">
            <div class="card-body">
              <h5 class="card-title text-center">{{$aplicacion->name}}</h5>
              <p class="card-text">{{$aplicacion->description}}</p>
              <p>${{$aplicacion->price}}</p>
              <div class="d-flex justify-content-end">
                <a href="{{ url('detail', $aplicacion->id)}}"><button type="button" class="btn btn-primary">Detalle</button></a>
              </div>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>

  <h1 id="educacion" class="text-center" style="color:blue; font-size:2rem;">Aplicaciones de Educación</h1>
  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
    @foreach ($apps_educacion as $aplicacion)
      @if ($aplicacion->deleted == 0)
        <div class="col mb-4">
          <div class="card shadow-sm">
            <img src="{{ asset('storage').'/'.$aplicacion->picture}}" class="card-img-top" alt="..." style="height:220px">
            <div class="card-body">
              <h5 class="card-title text-center">{{$aplicacion->name}}</h5>
              <p class="card-text">{{$aplicacion->description}}</p>
              <p>${{$aplicacion->price}}</p>
              <div class="d-flex justify-content-end">
                <a href="{{ url('detail', $aplicacion->id)}}"><button type="button" class="btn btn-primary">Detalle</button></a>
              </div>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>

  <h1 id="juegos" class="text-center" style="color:blue; font-size:2rem;">Aplicaciones de Juegos</h1>
  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
    @foreach ($apps_juegos as $aplicacion)
      @if ($aplicacion->deleted == 0)
        <div class="col mb-4">
          <div class="card shadow-sm">
            <img src="{{ asset('storage').'/'.$aplicacion->picture}}" class="card-img-top" alt="..." style="height:220px">
            <div class="card-body">
              <h5 class="card-title text-center">{{$aplicacion->name}}</h5>
              <p class="card-text">{{$aplicacion->description}}</p>
              <p>${{$aplicacion->price}}</p>
              <div class="d-flex justify-content-end">
                <a href="{{ url('detail', $aplicacion->id)}}"><button type="button" class="btn btn-primary">Detalle</button></a>
              </div>
            </div>
          </div>
        </div>
      @endif
   @endforeach
  </div>

  <h1 id="musica" class="text-center" style="color:blue; font-size:2rem;">Aplicaciones de Música</h1>
  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
    @foreach ($apps_musica as $aplicacion)
      @if ($aplicacion->deleted == 0)
        <div class="col mb-4">
          <div class="card shadow-sm">
            <img src="{{ asset('storage').'/'.$aplicacion->picture}}" class="card-img-top" alt="..." style="height:220px">
            <div class="card-body">
              <h5 class="card-title text-center">{{$aplicacion->name}}</h5>
              <p class="card-text">{{$aplicacion->description}}</p>
              <p>${{$aplicacion->price}}</p>
              <div class="d-flex justify-content-end">
                <a href="{{ url('detail', $aplicacion->id)}}"><button type="button" class="btn btn-primary">Detalle</button></a>
              </div>
            </div>
          </div>
        </div>
      @endif
   @endforeach
  </div>

</div>

@endsection
