@extends('layouts.app')

@section('content')
  <div class="container">

    <h3>Editar aplicacion: {{ $aplicacion->name }}</h3>

    <a href="{{ url('me/application') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>

    <form action="{{url('me/application/'. $aplicacion->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
          {{ csrf_field() }}


      <div class="form-group">
          <label for="Nombre" class="control-label">Nombre</label>
          <input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="name" id="name" value="{{ isset($aplicacion->name)?$aplicacion->name:old('Nombre') }}">
          {!! $errors-> first('Nombre','<div class="invalid-feedback">:message</div>') !!}
      </div>

      <div class="form-group">
          <label for="Descripcion" class="control-label">Descripción</label>
          <input type="text" class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}" name="description" id="description" value="{{ isset($aplicacion->description)?$aplicacion->description:old('Descripcion') }}">
          {!! $errors-> first('Descripcion','<div class="invalid-feedback">:message</div>') !!}
      </div>

      <div class="form-group">
          <label for="Precio" class="control-label">Precio</label>
          <input type="number" min="0" step="any" class="form-control form-control {{$errors->has('Precio')?'is-invalid':''}}" name="price" id="price" value="{{ isset($aplicacion->price)?number_format((float)$aplicacion->price, 2, '.', ''):number_format((float)old('Precio'), 2, '.', '') }}">
          {!! $errors-> first('Precio','<div class="invalid-feedback">:message</div>') !!}
      </div>

      <div class="form-group">
          <label for="id_categoria" class="control-label">Categoria</label>
          <select name="category_id" id="category_id" class="form-control {{$errors->has('id_categoria')?'is-invalid':''}}" value="{{ isset($aplicacion->category_id)?$aplicacion->category_id:old('id_categoria')}}">
              @foreach($categorias as $categoria)
              <option name="id_categoria" value="{{$categoria->id}}">{{$categoria->name}}</option>
              @endforeach
          </select>
          {!! $errors-> first('id_categoria','<div class="invalid-feedback">:message</div>') !!}
      </div>

      <div class="form-group">
          <label for="Foto" class="control-label">Fotografía</label>
          @if(isset($aplicacion->picture))
          <br>
          <img src="{{ asset('storage'). '/' . $aplicacion->picture}}" alt="" width="100" height="100" class="img-thumbnail img-fluid">
          <br>
          <br>
          @endif
          <input type="file" class="form-control-file {{$errors->has('picture')?'is-invalid':''}}" name="Picture" id="Picture" value="{{ isset($aplicacion->picture)?$aplicacion->picture:''}}">
          {!! $errors-> first('Foto','<div class="invalid-feedback">:message</div>') !!}
      </div>
      <input type="submit" class="btn btn-success" value="Editar">
    </form>
  </div>

@endsection
