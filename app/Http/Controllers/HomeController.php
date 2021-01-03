<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $aplicaciones = Application::All();
      if (auth()->check() && auth()->user()->role == 'desarrollador'){
        return redirect('/me/application');
      }elseif (auth()->check() && auth()->user()->role == 'cliente') {
        return view('client');
      }
      else{
        return view('welcome', compact('aplicaciones'));
      }
    }
}
