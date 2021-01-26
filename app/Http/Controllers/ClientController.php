<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Buy;
use App\User;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
  public function index()
  {
    $aplicaciones = DB::table('applications')
        ->join('buys', function ($join) {
            $id_usuario = auth()->user()->id;
            $join->on('applications.id', '=', 'buys.application_id')
                 ->where('buys.buyer_id', '=', $id_usuario);
        })
        ->latest('buys.created_at')
        ->paginate(10);
    return view('client', compact('aplicaciones'));
  }

  public function show($id)
  {
    $aplicacion = DB::table('applications')
      ->join('buys', function($join) use($id){
        $join->on('applications.id', '=', 'buys.application_id')
             ->where('buys.id', '=', $id);
      })->first();
    $aplicacion_id =  $aplicacion->application_id;

    $categoria = DB::table('applications')
        ->join('categories', function ($join) use($aplicacion_id){
            $join->on('applications.category_id', '=', 'categories.id')
                ->where('applications.id', '=', $aplicacion_id);
          })->get();
    $resultado = json_decode($categoria, true);
    $nombre_categoria =  $resultado[0]['name'];

    return view('client_detail', compact('aplicacion', 'nombre_categoria'));
  }

}
