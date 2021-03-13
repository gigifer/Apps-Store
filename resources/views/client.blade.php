@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">Tus Aplicaciones</h1>
    <table class="table table-light table-hover">
        <thead class="thead-light">
          <tr>
            <th style="width: 10%">#</th>
            <th style="width: 20%">Nombre</th>
            <th style="width: 30%">Descripcion</th>
            <th style="width: 20%">Foto</th>
            <th style="width: 20%">Acción</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($compra_aplicaciones as $aplicacion)
          <tr>
            <td style="width: 10%">{{$loop->iteration}}</td>
              <td style="width: 20%">{{$aplicacion->application->name}}</td>
              <td style="width: 30%">{{$aplicacion->application->description}}</td>
              <td style="width: 20%"><img src="{{ asset('storage'). '/' . $aplicacion->application->picture}}" class="img-thumbnail img-fluid" alt="" width="100"></td>
              <td style="width: 20%">
                <a class="btn btn-success btn-sm" href="{{ url('me/client/' . $aplicacion->id)}}"> Detalle</a>
                <button type="submit" onclick="deleteConfirmation({{ $aplicacion->id }})" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
              </td>
          </tr>
          @endforeach
        </tbody>
    </table>

    {{ $compra_aplicaciones->links() }}

</div>

<script type="application/javascript">
  function deleteConfirmation(id_to_delete){
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
        axios.delete('/api/buy/' + id_to_delete )
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
