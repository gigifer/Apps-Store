<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Category;

class CatalogeController extends Controller
{
  public function index()
    {
      $aplicaciones = Application::with('category')->get();
      //return $aplicaciones[3]->category_id;
      //$apps_comida = Application::where('category_id', '1')->get();
      //$apps_educacion = Application::where('category_id', '2')->get();
      //$apps_juegos = Application::where('category_id', '3')->get();
      //$apps_musica = Application::where('category_id', '4')->get();
      //return view('/welcome',compact('apps_comida', 'apps_educacion', 'apps_juegos', 'apps_musica'));

      return view('/welcome',compact('aplicaciones'));

    }

  public function show($id){
        $aplicacion=Application::where('id',$id)->first();
        return view('detail',compact('aplicacion'));
    }
}
