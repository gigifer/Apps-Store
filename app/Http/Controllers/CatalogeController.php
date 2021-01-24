<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class CatalogeController extends Controller
{
  public function index()
    {
      $aplicaciones=Application::all();
      $apps_comida = Application::where('category_id', '1')->get();
      $apps_educacion = Application::where('category_id', '2')->get();
      $apps_juegos = Application::where('category_id', '3')->get();
      $apps_musica = Application::where('category_id', '4')->get();
      return view('/welcome',compact('aplicaciones', 'apps_comida', 'apps_educacion', 'apps_juegos', 'apps_musica'));

    }

  public function show($id){
        $aplicacion=Application::where('id',$id)->first();
        return view('detail',compact('aplicacion'));
    }
}
