@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">Tus Aplicaciones</h1>
    <table class="table table-light table-hover">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
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
              <td><img src="{{ asset('storage'). '/' . $aplicacion->picture}}" class="img-thumbnail img-fluid" alt="" width="100"></td>
              <td>
                <form method="POST" action="{{ url('me/client/' . $aplicacion->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" id="delete" onclick="borrar() "class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(&quot;¿Confirma borrar?&quot;)" value="{{ $aplicacion->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                </form>
              </td>
          </tr>
          @endforeach
        </tbody>
    </table>

    {{ $aplicaciones->links() }}

</div>

<script type="application/javascript">
  document.getElementById("delete").addEventListener("click", borrar);

  function borrar() {
    var data = document.getElementById('delete').value;
    console.log(data);

    axios.delete('client' + data)
  }

</script>

<script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection
