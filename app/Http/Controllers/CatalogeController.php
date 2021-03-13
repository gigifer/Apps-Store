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

      return view('/welcome',compact('aplicaciones'));

    }

  public function show($id){
        $aplicacion=Application::where('id',$id)->first();
        return view('detail',compact('aplicacion'));
    }
}
