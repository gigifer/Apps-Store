@extends('layouts.app')

@section('content')
  <div class="container">

    <h3>Editar aplicacion: {{ $aplicacion->name }}</h3>

    <a href="{{ url('me/application') }}" title="Back"><button class="btn btn-warning btn-sm mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>

    <form action="{{url('me/application/'. $aplicacion->id )}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}

      <div class="form-group">
          <label for="Nombre" class="control-label">Nombre</label>
          <input type="text" class="form-control" name="Name" id="Name" value="{{ $aplicacion->name }}">
      </div>

      <div class="form-group">
          <label for="Descripcion" class="control-label">Descripción</label>
          <input type="text" class="form-control {{$errors->has('Description')?'is-invalid':''}}" name="Description" id="Description" value="{{ isset($aplicacion->description)?$aplicacion->description:old('Descripcion') }}">
          {!! $errors-> first('Description','<div class="invalid-feedback">:message</div>') !!}
      </div>

      <div class="form-group">
          <label for="Precio" class="control-label">Precio</label>
          <input type="number" min="0" step="any" class="form-control form-control {{$errors->has('Price')?'is-invalid':''}}" name="Price" id="Price" value="{{ isset($aplicacion->price)?number_format((float)$aplicacion->price, 2, '.', ''):number_format((float)old('Precio'), 2, '.', '') }}">
          {!! $errors-> first('Price','<div class="invalid-feedback">:message</div>') !!}
      </div>

      <div class="form-group">
          <label for="id_categoria" class="control-label">Categoria</label>
          <input type="text" class="form-control" name="id_categoria" id="id_categoria" value="{{ $aplicacion->category->name}}">
      </div>

      <div class="form-group">
          <label for="Foto" class="control-label">Fotografía</label>
          @if(isset($aplicacion->picture))
          <br>
          <img src="{{ asset('storage'). '/' . $aplicacion->picture}}" alt="" width="100" height="100" class="img-thumbnail img-fluid">
          <br>
          <br>
          @endif
          <input type="file" class="form-control-file {{$errors->has('Picture')?'is-invalid':''}}" name="Picture" id="Picture" value="{{ isset($aplicacion->picture)?$aplicacion->picture:''}}">
          {!! $errors-> first('Picture','<div class="invalid-feedback">:message</div>') !!}
      </div>
      <input type="submit" class="btn btn-success" value="Editar">
    </form>
  </div>

<script type="application/javascript">
  document.getElementById("Name").disabled = true;
  document.getElementById("id_categoria").disabled = true;
</script>

@endsection
