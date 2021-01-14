@extends('layouts.app')

@section('content')
<div class="container">

  <form action="{{url('me/application')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

    <div class="form-group">
        <label for="Nombre" class="control-label">Nombre</label>
        <input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="Nombre" id="Nombre" value="{{ isset($applications->name)?$applications->name:old('Nombre') }}">
        {!! $errors-> first('Nombre','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="Descripcion" class="control-label">Descripción</label>
        <input type="text" class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}" name="Descripcion" id="Descripcion" value="{{ isset($applications->description)?$applications->description:old('Descripcion') }}">
        {!! $errors-> first('Descripcion','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="Precio" class="control-label">Precio</label>
        <input type="number" min="0" step="any" class="form-control form-control {{$errors->has('Precio')?'is-invalid':''}}" name="Precio" id="Precio" value="{{ isset($applications->price)?number_format((float)$applications->price, 2, '.', ''):number_format((float)old('Precio'), 2, '.', '') }}">
        {!! $errors-> first('Precio','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="id_categoria" class="control-label">Categoria</label>
        <select name="id_categoria" id="id_categoria" class="form-control {{$errors->has('id_categoria')?'is-invalid':''}}" value="{{ isset($applications->category_id)?$applications->category_id->name:old('id_categoria')}}">
            @foreach($categorias as $categoria)
            <option name="id_categoria" value="{{$categoria->id}}">{{$categoria->name}}</option>
            @endforeach
        </select>
        {!! $errors-> first('id_categoria','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="Foto" class="control-label">Fotografía</label>
        @if(isset($applications->picture))
        <br>
        <img src="{{ asset('storage'). '/' . $applications->picture}}" alt="" width="100" height="100" class="img-thumbnail img-fluid">
        <br>
        <br>
        @endif
        <input type="file" class="form-control-file {{$errors->has('Foto')?'is-invalid':''}}" name="Foto" id="Foto" value="{{ isset($applications->picture)?$applications->picture:''}}">
        {!! $errors-> first('Foto','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <br>
    <input type="submit" class="btn btn-success" onclick="crear()" id="crear" value="crear">
  </form>
  <a href="{{ url('me/application') }}" title="Back"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
</div>

<script type="application/javascript">
    document.getElementById("crear").addEventListener("click", crear);

    function crear(){
      Swal.fire({
        icon: 'success',
        title: 'Su compra se realizó con éxito',
        showConfirmButton: false,
        timer: 1500
      })
    }
</script>

<script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection
