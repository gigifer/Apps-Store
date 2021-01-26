@extends('layouts.app')

@section('content')
<div class="container">
  @if ($mensaje = Session::get('success'))
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $mensaje }}</strong>
    </div>
  @endif
    <h1 class="text-center">Tus Aplicaciones</h1>
    <a href="{{ url('me/application/create')}}" class="btn btn-success mb-3">Agregar Aplicacion</a>

    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th style="width: 0.5%">#</th>
                <th style="width: 15%">Nombre</th>
                <th style="width: 30%">Descripcion</th>
                <th style="width: 15%">Precio</th>
                <th style="width: 15%">Foto</th>
                <th style="width: 20%">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aplicaciones as $aplicacion)
              @if ($aplicacion->deleted == 0)
            <tr>
                <td style="width: 0.5%">{{$loop->iteration}}</td>
                <td style="width: 15%">{{$aplicacion->name}}</td>
                <td style="width: 30%">{{$aplicacion->description}}</td>
                <td style="width: 15%"><?php echo number_format((float) $aplicacion['price'], 2, '.', ''); ?></td>
                <td style="width: 15%"><img src="{{ asset('storage'). '/' . $aplicacion->picture }}" class="img-thumbnail img-fluid" alt="" width="100"></td>
                <td style="width: 20%">
                  <a class="btn btn-success btn-sm" href="{{ url('me/application/' . $aplicacion->id) }}"> Detalle</a>
                  <a class="btn btn-warning btn-sm" href="{{ url('me/application/' . $aplicacion->id . '/edit') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                  <button type="submit"  onclick="deleteConfirmation({{ $aplicacion->id }})" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                </td>
            </tr>
            @endif
          @endforeach
        </tbody>
    </table>

    {{ $aplicaciones->links() }}

</div>

<script type="application/javascript">
  function deleteConfirmation(id){
    Swal.fire({
      title: '¿Confirma borrar?',
      text: "¡Esta acción no se puede revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, borrar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {

      if (result.isConfirmed) {

        axios.delete('/me/application/' + id )
        .then((response) => {
          if(response.status == 200){
            Swal.fire(
              '¡Borrado!',
              '¡Su app se ha eliminado!',
              'success')
          }
          location.reload();
        })
      }
    })
  }
</script>

@endsection
