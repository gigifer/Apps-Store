<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class CatalogeController extends Controller
{
  public function index()
    {
        $aplicaciones=Application::all();
      return view('/welcome',compact('aplicaciones'));
    }

  public function show($id){
        $aplicacion=Application::where('id',$id)->first();
        return view('detail',compact('aplicacion'));
    }
}
