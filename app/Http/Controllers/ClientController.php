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
        //->get();
        ->paginate(10);
    return view('client', compact('aplicaciones'));
  }

  public function destroy($id)
    {
      Buy::destroy($id);

      return redirect('me/client')->with('flash_message', 'aviso deleted!');
    }
}
