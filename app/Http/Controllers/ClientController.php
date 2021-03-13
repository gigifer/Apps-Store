<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Buy;
use App\User;
//use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
  public function index()
  {
    $id_usuario = auth()->user()->id;
    $compra_aplicaciones = Buy::where('buyer_id', $id_usuario)
    ->latest('buys.created_at')
    ->paginate(10);

    return view('client', compact('compra_aplicaciones'));
  }

  public function show($id)
  {
    $compra_detalle = Buy::findOrFail($id);

    return view('client_detail', compact('compra_detalle'));
  }

}
