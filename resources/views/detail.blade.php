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
      <div>
        <button type="button" id="buy" onclick="guardar()" class="btn btn-success" name="button" value="{{ $aplicacion->id }}">comprar</button>
      </div>
      <div class="mt-3">
        <a href="{{ url('/') }}" title="Back"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
      </div>
    </div>
  </div>
</div>


<script type="application/javascript">
  document.getElementById("buy").addEventListener("click", guardar);

  function guardar() {
    var data = document.getElementById('buy').value;

    axios({
      method:'POST',
      url: '{{ url('/api/buy') }}',
      data: {id : data}
    })
    .then(res => {
      console.log(res)
      if (res.data == 'Nueva compra realizada') {
        window.location.href = "{{ url('me/client')}}";
         Swal.fire({
           icon: 'success',
           title: 'Su compra se realizó con éxito',
           showConfirmButton: false,
           timer: 1500
         })
      }
      else{
        Swal.fire('Debe ser cliente para comprar')
          window.location.href = "{{ url('/')}}";
      }
    })
    .catch(function(error) {
      console.log(error)

    })
  }

</script>

<script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


@endsection
