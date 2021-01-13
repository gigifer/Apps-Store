@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Tus Aplicaciones</h1>
    <a href="{{ url('me/application/create')}}" class="btn btn-success">Agregar Aplicacion</a>

    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Foto</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aplicaciones as $aplicacion)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$aplicacion->name}}</td>
                <td>{{$aplicacion->description}}</td>
                <td><?php echo number_format((float) $aplicacion['price'], 2, '.', ''); ?></td>
                <td>{{$aplicacion->category_id}}</td>
                <td><img src="{{ asset('storage'). '/' . $aplicacion->picture }}" class="img-thumbnail img-fluid" alt="" width="100"></td>
                <td>
                  <a class="btn btn-warning btn-sm" href="{{ url('me/application/' . $aplicacion->id . '/edit') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                  <form method="POST" action="{{ url('me/application/' . $aplicacion->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(&quot;¿Confirma borrar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                  </form>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>

    {{ $aplicaciones->links() }}

</div>

@endsection
